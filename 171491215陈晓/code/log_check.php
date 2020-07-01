<?php 
include("conn.php");
$xm=$_POST["adname"];
$ps=$_POST["admm"];
$sql="select * from Admin where admin='$xm' AND password='$ps'";
//echo $sql;exit();
$result = mysql_query($sql,$db) OR die (mysql_error($db));
$row = mysql_fetch_array($result);
if($row)
{	foreach ($_COOKIE as $key => $value)
 	{
 		setcookie($key,"",time()-1);
 	}
	setcookie("adname",$xm);
	setcookie("password",$ps);
	echo "<script>{alert('登录成功');location.href='admin_home.php';} </script>";}
else 
    echo "<script>{alert('用户名/密码输入错误，请重试或联系管理员');location.href='default.php';} </script>";
//header("Location:index_access.php");//这是PHP的重新定向的一般方法
?>