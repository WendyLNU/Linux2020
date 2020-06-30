<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php include("connect.php");
session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<?php 
$t=$_GET['title'];
$c=$_GET['content'];
$d=$_GET['deadline'];
$h=$_GET['hid'];
$ci=$_GET['cid'];
?>
<center><table width="645" height="308" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="641" height="39" align="center"><?php echo $t;?></td>
  </tr>
  <tr>
    <td height="480" align="center"><?php echo $c;?></td>
  </tr>
  <tr>
    <td height="39" align="center"><?php echo $d;?></td>
  </tr>
  <tr>
    <td height="39" align="center">
	<form action="" method="post" name="f1" onSubmit="renturn myhomework()">
		选择作业文件<input name="" type="file" />
		<input name="submit" type="submit" value="提交" />(请输入PDF格式的文件)
	</form>
	</td>
  </tr>
</table>
</center>
<?php 

if(isset($_POST['submit'])){
$result=mysql_query("insert into homework (hid,sid,cid) values('$h','{$_SESSION['id']}','$ci')");
}
?>

</body>
</html>

