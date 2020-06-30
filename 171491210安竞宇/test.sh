#!/bin/bash
source ./variables.sh
#mysql -h$HOST -u$User -p$PW 2>/dev/null
#运程连接只需要在在调用数据库的时候加上 -h$hostname 就可以直接访问数据库服务器,但是加上之后虚拟机连接有点慢，此程序由于是在本地运行的就没加上。由于数据库版本问题，新版的mysql不允许直接使用密码，只要使用密码就会警告，大多数的密码警告都已经被我用2>/dev/null给抹除了，但是一直有一个不知道在哪里调用了，删不掉
#登录界面
menu()
 {
         echo "1.教师登录"
         echo "2.学生登录"
         echo "0.退出系统"
         read val
         case $val in
                 1)
                         t_register
                         ;;
                 2)
                         s_register
                         ;;
                 0)
                         exit
                         ;;
         esac
 }
#教师登录
 t_register()
 {   
         clear
         echo "请输入用户名"
         read name
	 echo "请输入密码"
	 read pw
	 t_pw=$(mysql -u$User -p$PW $dbname -N -e "select pw from teacher where name='$name'") 2>/dev/null
	if [ "$t_pw" = "$pw" ];then
		t_operate
	else
		echo "帐号或密码输入错误,请按任意键重新输入"
		read -n1 
		t_register
	fi

 }
#教师窗口
t_operate()
{
	
	clear
         echo "1.输出学生信息"
         echo "2.录入学生信息"
         echo "3.查询学生信息"
         echo "4.删除学生信息"
         echo "5.修改学生信息"
         echo "0.退出系统"
	 read val
         case $val in
                 1)
                         print_all
                         ;;
                 2)
                         write_stu
                         ;;
		 3)
			 select_stu
			 ;;
		 4)
			 del_stu
			 ;;
		 5)
			 cha_stu
			 ;;
                 0)
                         exit
                         ;;
         esac 
}
#输出全体学生信息
print_all()
{
	clear
         echo "所有学生信息如下:"
         mysql -u$User -p$PW $dbname  -e "select sid as '学号',sname as '姓名',sex as '性别',age as '年级',spw as '密码' from student" 2>/dev/null
	 
	 read -n1 -p "按任意键继续"
	 t_operate
}
#录入学生信息(sid不可以相同，其他随便)
write_stu()
{

	clear
         read -p "输入学号:" sid
	 read -p "输入姓名:" sname
	 read -p "输入性别:" sex
	 read -p "输入年级:" age
	 read -p "输入密码:" spw
	em=$(mysql -u$User -p$PW $dbname -N -e "select sname from student where sid='$sid'" ) 2>/dev/null
         if [ "$em" ];then
 		echo "学号已存在，学号不能重复"
		read -n1 -p "按任意键继续"
		t_operate
                
         else
                mysql -u$User -p$PW $dbname  -e "insert into student values('$sid','$sname','$sex','$age','$spw')" 2>/dev/null
		read -n1 -p "按任意键继续"
		t_operate
         fi
}
#查询学生信息
select_stu()
{
	clear
	read -p "输入学号:" sid
	em=$(mysql -u$User -p$PW $dbname -N -e "select sname from student where sid='$sid'") 2>/dev/null
	if [ "$em" ];then
		mysql -u$User -p$PW $dbname  -e "select sid as '学号',sname as '姓名',sex as '性别',age as '年级',spw as '密码'  from student where sid='$sid'" 2>/dev/null
		read -n1 -p "按任意键继续"
		t_operate
	else
		echo "学号不存在"
		read -n1 -p "按任意键继续"
		t_operate
	fi
}
#删除学生信息
del_stu()
{
	clear
	read -p "输入学号:" sid
	em=$(mysql -u$User -p$PW $dbname -N -e "select sname from student where sid='$sid'") 2>/dev/null
	if [ "$em" ];then
		mysql -u$User -p$PW $dbname  -e "delete from student where sid='$sid'" 2>/dev/null
		read -n1 -p "已删除，按任意键继续"
		t_operate
	else
		echo "学号不存在"
		read -n1 -p "按任意键继续"
		t_operate
	fi
}
#修改学生信息(正常来说学号应该不可更改，如果非要改学号的话直接删除再创建吧)
cha_stu()
{
	clear
	read -p "输入学号:" sid
	em=$(mysql -u$User -p$PW $dbname -N -e "select sname from student where sid='$sid'") 2>/dev/null
	if [ "$em" ];then
	 	echo "1.修改姓名"
         	echo "2.修改性别"
         	echo "3.修改年级"
		echo "4.修改密码"
		echo "0.不改了"
         	read val
       	case $val in
                 1)
                         read -p "新的姓名：" sname
			 mysql -u$User -p$PW $dbname  -e "update student set sname='$sname' where sid='$sid'" 2>/dev/null
                         ;;
                 2)
                         read -p "新的性别：" sex
			 mysql -u$User -p$PW $dbname  -e "update student set sex='$sex' where sid='$sid'" 2>/dev/null
                         ;;
 		 3)
                         read -p "新的年级：" age
			 mysql -u$User -p$PW $dbname  -e "update student set age='$age' where sid='$sid'" 2>/dev/null
                         ;;
		 4)
			 read -p "新的密码：" spw
			 mysql -u$User -p$PW $dbname  -e "update student set spw='$spw' where sid='$sid'" 2>/dev/null
                         ;;
                 0)
                         exit
                         ;;
         esac
		read -n1 -p "已修改，按任意键继续"
		t_operate
	else
		echo "学号不存在"
		read -n1 -p "按任意键继续"
		t_operate
	fi

}
#学生登录(学生由于查的是自己信息选择查询信息或者修改密码如果需要再次登录未免太过于繁琐，因此选择使用一个全据变量mynum来缓存学号)
s_register()
{
	clear
         echo "请输入学号"
         read sid
	 echo "请输入密码"
	 read pw
	 s_pw=$(mysql -u$User -p$PW $dbname -N -e "select spw from student where sid='$sid'") 2>/dev/null
	if [ "$s_pw" = "$pw" ];then
		export mynum=$sid
		s_operate
	else
		echo "帐号或密码输入错误,请按任意键重新输入"
		read -n1 
		s_register
	fi
}
#学生窗口(实际来看学生基本上只能查看自己的信息和修改密码其他的没有权利改动)
s_operate()
{
	
	clear
         echo "1.查询个人信息"
         echo "2.修改密码"
         echo "0.退出系统"
	 read val
         case $val in
                 1)
                         print_me
                         ;;
                 2)
                         alter_pw
                         ;;

                 0)
                         exit
                         ;;
         esac 
}
#查看个人信息
print_me()
{
	clear
		mysql -u$User -p$PW $dbname  -e "select sid as '学号',sname as '姓名',sex as '性别',age as '年级',spw as '密码'  from student where sid='$mynum'" 2>/dev/null
		read -n1 -p "按任意键继续"
		s_operate
	
}
#修改个人信息
alter_pw()
{
	clear
	read -p "新的密码:" spw
	mysql -u$User -p$PW $dbname  -e "update student set spw='$spw' where sid='$mynum'" 2>/dev/null
	read -n1 -p "已修改，按任意键继续"
		s_operate
}

menu

