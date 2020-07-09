<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	include("connect.php");
	mysql_query("SET NAMES GB2312");
	session_start();
	if(!isset($_SESSION["pass"])){
    	echo "<script language='javascript'>alert('请通过正确途径登录本系统!');"; 
		echo "document.location.href='study.php'";
		echo "</script>";
		exit(); 
 	 }
	if(!$_SESSION["pass"]){
		echo "<script language='javascript'>alert('请通过正确途径登录本系统!');"; 
		echo "document.location.href='study.php'";
		echo "</script>";
		exit(); 
  	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
</body>
</html>
