#! /bin/bash
readonly snakeHead='H'       #定义蛇头
readonly snakeBody='x'       #定义蛇身
readonly wall='I'	     #定义墙体
readonly spac='.'	     #定义空隙
readonly snakeFood='F'	     #定义食物
map_length=20		     #墙长
map_width=20		     #墙宽
snake_begin=(28 29 30)	     #蛇的初始位置
snake_length=3               #蛇的初始长度
judge_return=0               #蛇下一步的情况的返回
snake_return=0               #蛇走下一步后的返回
var=0                        #一个变量
source_x=0                   #蛇头的x坐标位置
source_y=0                   #蛇头的y坐标位置
food_pos=51                  #食物的初始位置

map=($wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall 
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $spac $wall
	 $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall $wall
	 )

printMap(){
echo 
	for((i=0;i<map_length;i++)); do
		for((j=0;j<map_width;j++));do
			echo -e ${map[i*$map_length+j]} "\c"
		done
		echo
	done
}

readOption(){
	read next
	case $next in
		'q')
			snake_return=0
		;;
		'w')
			snakeMove -1 0
		;;
                's')
			snakeMove 1 0
		;;
		'a')
			snakeMove 0 -1
		;;
		'd')
			snakeMove 0 1
		;;
		*)
			echo 'please input w,a,s,d to operate the snake and then press enter!! \n Or you can press q to exit '
			snake_return=-1;
		;;
	esac
}

#判断蛇的下一步是什么字符
judge(){
	x=$1;
	y=$2;
	pos=$(($y*$map_length+$x));

	if test ${map[$pos]} = $snakeFood
	then
		judge_return=1
	elif test ${map[$pos]} = $wall -o ${map[$pos]} = $snakeBody
	then
		judge_return=0
  
        else
		judge_return=-1
	fi
}
#根据参数进行蛇的移动
snakeMove(){
	ver_move=$1;
	lev_move=$2;
	go_x=$(($source_x+$lev_move));
	go_y=$(($source_y+$ver_move));
	judge $go_x $go_y
	res=$judge_return
	if test $res == 0
	then
		snake_return=0;
	elif test $res == 1 
	then
		snake_begin[snake_length]=$(($go_y*$map_length+$go_x));
		snake_length=$snake_length+1;
		snake_return=1;
	else
		for((i=0;i<$snake_length-1;i++));do
			mid=${snake_begin[i]};
			if test $i -eq 0
			then
				map[$mid]=$spac;
			fi
			snake_begin[i]=${snake_begin[i+1]};
			snake_begin[i+1]=$mid;
		done
		snake_begin[snake_length-1]=$(($go_y*$map_length+$go_x));
		snake_return=-1;
	fi
}
mapGenerator(){
	mid=$(($snake_length-1))
	for((i=0;i<$snake_length;i++));do
		if [[ $i == $mid ]];then
			map[${snake_begin[$i]}]=$snakeHead;
		else
			map[${snake_begin[$i]}]=$snakeBody;
		fi
	done
	map[$food_pos]=$snakeFood
}

foodGenerator(){
	while [[ 1 ]]; do
		num=$((RANDOM% ($map_length * $map_width) ))
		echo $num ${map[$num]} + $spac
		if test ${map[$num]} = $spac
			then
			food_pos=$num
			break
		fi
	done
}
score=0
while [[ 1 ]]; do
	var=$(($snake_length-1));
	source_y=$((${snake_begin[$var]} / $map_length));
	source_x=$((${snake_begin[$var]} % $map_length));
	snake_return=0
	mapGenerator
	echo -e "score:$score \n w -up    s -down     a -left    d -right    q -exit\n"

	printMap
	
	readOption
	res=$snake_return
	echo $res
	if test $res == 0
	then
		echo "你的最终得分是" $score "!下次继续努力! "
		break;
	elif test $res == 1
	then
		score=$(($score+1))
		foodGenerator
	fi
	clear
done



