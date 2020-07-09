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
<center><font size="+3"><strong>作业（记得完成哦）</strong></font></center>
	<br/>
	<center>
<table width="963" height="29" border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td width="230" align="center" bgcolor="#BEF8FC" ><font size="4" >所属课程</font></td>
    <td width="473" align="center" bgcolor="#BEF8FC"><font size="4" >题目</font></td>
    <td width="132" align="center" bgcolor="#BEF8FC"><font size="4" >截止时间</font></td>
    <td width="118" align="center" bgcolor="#BEF8FC"><font size="4" >查看详情</font></td>
  </tr>
 <?php
 $result1=mysql_query("select * from homework,sc where sc.sid={$_SESSION["id"]} and homework.cid=sc.cid");
 while($row1=mysql_fetch_array($result1)){
 	$result2=mysql_query("select * from course where course.cid={$row1['cid']}");
	$row2=mysql_fetch_array($result2);
  ?> 
  <tr>
    <td width="230" align="center" bgcolor="#C2E1F1"><?php echo $row2['cname']; ?></td> 
    <td width="473" align="center" bgcolor="#C2E1F1"><?php echo $row1['title']; ?></td>
    <td width="132" align="center" bgcolor="#C2E1F1"><?php echo $row1['deadline']; ?></td>
    <td width="118" align="center" bgcolor="#C2E1F1"><a href="<?php echo "hdetails.php?title={$row1['title']}&deadline={$row1['deadline']}&content={$row1['content']}&hid={$row1['hid']}&cid={$row1['cid']}"?>" target="_blank">查看</a></td>
  </tr><?php }?>
  
</table>

</body>
</html>
