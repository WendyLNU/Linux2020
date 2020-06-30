<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	include("connect.php"); 
	?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
</head>

<body>
<center><font size="+6"><strong>本学期课程</strong></font></center>
	<br/>
	<center>
		<table width="809" height="29" border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#99FFFF">
    <td width="138" height="20" align="center"><font size="4" >课序号</font></td>
    <td width="299" align="center"><font size="4">课名</font></td>
    <td width="109" align="center"><font size="4">任课教师</font></td>
    <td width="52" align="center"><font size="4">学时</font></td>
    <td width="65" align="center"><font size="4">类型</font></td>
	<td width="132" align="center"><font size="4">留言区</font></td>
  </tr>
  <?php 
  $result1 = mysql_query("select * from sc,course where sc.sid={$_SESSION["id"]} and sc.cid=course.cid ");
  $row1=mysql_fetch_array($result1);
  while($row1=mysql_fetch_array($result1)){
   ?>
   <?php 
   $result2=mysql_query("select * from tc where tc.cid={$row1['cid']}");
   $row2=mysql_fetch_array($result2);
   $result3=mysql_query("select * from teacher where tid={$row2['tid']}");
   $row3=mysql_fetch_array($result3);
   ?>
  	 <tr bgcolor="#6666FF" >
		<td width="138" height="20" align="center"><?php echo $row1['cid'];?></td>
		<td width="299" align="center"><?php echo $row1['cname'];?></td>
		<td width="109" align="center"><?php echo $row3['tname'];?></td>
		<td width="52" align="center"><?php echo $row1['ctime'];?></td>
		<td width="65" align="center"><?php echo $row1['cclass'];?></td>
		<td width="132" align="center"><a href="words.php?cid=<?php echo $row1['cid'];?>">留言</a></font></td>
	  </tr>
	 <?php }?>
</table>

	</center>
</body>
</html>
