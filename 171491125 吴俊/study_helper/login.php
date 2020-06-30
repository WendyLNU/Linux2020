<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php session_start();?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php include("connect.php"); ?>
	

<?php 

if(isset($_POST['Submit'])) 
 { 
  	$username = $_POST['id']; 
  	$password = $_POST['pd'];
    $sql1 = "SELECT * FROM student Order By sid";
    $result1 = mysql_query($sql1,$con) OR die (mysql_error($con));
	$sql2 = "SELECT * FROM teacher Order By tid";
    $result2 = mysql_query($sql2,$con) OR die (mysql_error($con));
	$flag1=1;
	$flag2=1;
    while($row = mysql_fetch_array($result1)){
		if($username==$row["sid"]&&$password==$row["spd"]){
			$flag1=0;
			$_SESSION["pass"]=$password;
			$_SESSION["id"]=$username;
			$_SESSION["class"]="s";
			header("location:student.php");
			break;
			}
		}
	while($row = mysql_fetch_array($result2)){
		if($username==$row["tid"]&&$password==$row["tpd"]){
				$flag2=0;
				$_SESSION["pass"]=$password;
			    $_SESSION["id"]=$username;
				$_SESSION["class"]="t";
				header("location:teacher.php");
				break;
				}
		}
	if($flag1==1&&$flag2==1)
			echo "请输入正确的账号或密码（三秒后返回登录页面）";
			header('Refresh:3,Url=study.php');
	}
	
else
	echo "error";
	?>
</body>
</html>