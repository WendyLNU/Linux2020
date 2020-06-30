<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include("right.php"); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>学生界面</title>
</head>

<body >

<style>
	body{
	background-image:url(21.jpg);
	background-size:cover;
	}
	#a1{
		
		width:400px;
		height:400px;
		position:absolute;
		left:0px;
		top:0px;
		}
	#a2{
		width:971px;
		height:300px;
		position:absolute;
		left:400px;
		top:0px;
		}
	#a3{
		width:400px;
		height:350px;
		position:absolute;
		left:0px;
		top:300px;
		}
	#a4{
		
		width:971px;
		height:350px;
		position:absolute;
		left:400px;
		top:300px;
		}
		#touxiang{
		width:200px;
		height:250px;
		position:absolute;
		left:30px;
		top:30px;
		}
		#name1{
			background-color:#FFFFFF;
			position:absolute;
			left:260px;
			top:60px;
			}
	    #name2{
			background-color:#FFFFFF;
			position:absolute;
			left:260px;
			top:100px;
			}
		#name3{
			background-color:#FFFFFF;
			position:absolute;
			left:260px;
			top:140px;
			}
		#name4{
			background-color:#FFFFFF;
			position:absolute;
			left:260px;
			top:170px;
			}
		#form1{
			position:absolute;
			left:280px;
			top:240px;
			}
		#tuijian{
		position:absolute;
		left:90px;
		top:30px;
		}
		#table1{
		position:absolute;
		left:60px;
		top:70px;
		}
</style>
<?php 
	
	$result = mysql_query("SELECT * FROM student where sid={$_SESSION["id"]}");
	$row=mysql_fetch_array($result);
	$_SESSION["username"]=$row['sname'];
	
?>
<div id="a1">
	<img src="20180513224039_tgfwu.png" id="touxiang"   />
	<font color="#000000" id="name1" size=5 face="Courier New, Courier, monospace"  >
		<strong><?php echo $row['sname'] ?></strong>
	</font>

	<font color="#000000" id="name2" size=5 face="Courier New, Courier, monospace"  >
		<strong><?php echo $row['ssex'] ?></strong>
	</font>

	<font color="#000000" id="name3" size=4 face="Courier New, Courier, monospace"  >
		<strong><?php echo $row['sid'] ?></strong>
	</font> 

	<font color="#000000" id="name4" size=5 face="Courier New, Courier, monospace"  >
		<strong><?php echo $row['smajor'] ?></strong>
	</font>
	<form action="passwd.php" method="post" name="mima" id="form1" >
	<a href="passwd.php" target="_blank"><input name="" type="button" value="修改密码" onclick="passwd.php" /></a>
	</form>
	
</div>

<div id="a2">
	<?php include("showcourse.php"); ?>
	
</div>
<div id="a3">
	<?php include("recommend.php"); ?>

</div>
<div id="a4">
	<?php include("homework.php"); ?></div>





</body>
</html>
