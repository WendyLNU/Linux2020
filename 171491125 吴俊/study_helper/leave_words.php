<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<center><font color="#666666" face="����" size="4"><strong>������</strong></font></center>
<br/>

<?php
//session_start();
$idid=$_SESSION["cid"];
include("select.php");
include("connect.php");
?>
<table width="500" border="1" cellspacing="0" cellpadding="2" align="center">
<?php
$sql = "SELECT * FROM content where cid='$idid'";
$result = mysql_query($sql,$con);
while($row = mysql_fetch_array($result))
  {
?>
  <tr>
    <td width="69" align="center">ѧ������</td>
    <td><?php echo $row["scontent"]; ?></td>
    <td width="161" align="center"><a href="delete.php?wid=<?php echo $row["wid"]; ?>" target="_self"><input name="" type="button" value="ɾ������" /></a><a href="update.php?wid=<?php echo $row["wid"]; ?>" target="_self"><input name="" type="button" value="�ظ�����" /></a></td>
  </tr>
<?php
  }	
?>
</table>
