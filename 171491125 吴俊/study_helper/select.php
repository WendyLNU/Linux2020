<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<form  name="f1" action=" " method="post" >
<center>请输入想留言的课程号（左侧可查看） <input name="w1" type="text" /> <input name="submit" type="submit" value="提交" /></center>
</form >
<?php

if(isset($_POST["w1"])){
	$_SESSION["cid"]=$_POST["w1"];
	}
	else
	echo "";
?>
<br />
</body>
</html>
