<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include("right.php"); 
header("Content-type:text/html;charset=gb2312");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<style>
	body{
	background-image:url(cdddc8953c7230f41f65c1f3bb753af.jpg);
	background-size:cover;
	}
	#a1{
		width:360px;
		height:300px;
		position:absolute;
		left:500px;
		top:0px;
		}
	#a2{
	width:500px;
	height:650px;
		position:absolute;
		left:0px;
		top:0px;
	}
	#a3{
	width:511px;
	height:650px;
		position:absolute;
		left:860px;
		top:0px;
	}
	#name1{
			position:absolute;
			left:60px;
			top:60px;
			}
	    #name2{
			position:absolute;
			left:60px;
			top:100px;
			}
		#name3{
			position:absolute;
			left:60px;
			top:140px;
			}
		#name4{
			position:absolute;
			left:60px;
			top:180px;
			}
		#form1{
			position:absolute;
			left:140px;
			top:240px;
			}
</style>
<?php 
	$result = mysql_query("SELECT * FROM teacher where tid={$_SESSION["id"]}");
	$row=mysql_fetch_array($result);
	$_SESSION["username"]=$row['tname'];
?>
<div id="a1">

	<font  id="name1" size=5 face="Courier New, Courier, monospace"  >
		<strong><?php echo $row['tname'] ?>老师，您好</strong>
	</font>
	
	<font  id="name2" size=5 face="Courier New, Courier, monospace"  >
		<strong>性别：<?php echo $row['tsex'] ?></strong>
	</font>

	<font  id="name3" size=5 face="Courier New, Courier, monospace"  >
		<strong>工号：<?php echo $row['tid'] ?></strong>
	</font> 

	<font  id="name4" size=5 face="Courier New, Courier, monospace"  >
		<strong>院系：<?php echo $row['tmajor'] ?></strong>
	</font>
	<form action="passwd.php" method="post" name="mima" id="form1" >
	<a href="passwd.php" target="_blank"><input name="" type="button" value="修改密码" onclick="passwd.php" /></a>
	</form>
	
</div>

<div id="a2">
<?php include("assign_homework.php"); ?>
</div>

<div id="a3">
<?php include("leave_words.php");?>
</div>
</body>
</html>
