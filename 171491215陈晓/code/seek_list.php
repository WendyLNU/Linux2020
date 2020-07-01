<?php
session_start(); 
if (empty($_GET['page']))
{
$_SESSION['seek_pos']="";
$_SESSION['seek_key']="";
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>新闻查询</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#FFFFCC" topmargin="0" leftmargin="0">

<?php
//error_reporting(E_ALL^E_NOTICE);
include("conn.php");
include("top.php");

if(empty($_SESSION['seek_key']) && empty($_SESSION['seek_pos']) )
{
	$key=$_POST["kkk"];
	$pos=$_POST["ppp"];
	$_SESSION['seek_pos']=$pos;
	$_SESSION['seek_key']=$key;
}
else
{
	$key=$_SESSION['seek_key'];
	$pos=$_SESSION['seek_pos'];
}

?>

<table width="778" height="99" border="0" align="center" cellpadding="2" cellspacing="0" >
  <tr>
	<th colspan="6" bgcolor="#FF66CC"  align="center"><?php echo "查找关键词 <t style=\"color:#FFFF33\">{$key}</t> 结果" ;?></th>
  </tr>
    <tr bgcolor=" #FF99CC" align="left">
    <td height="34">NID</td>
    <td>标题</td>
    <td>作者</td>
    <td>时间</td>
    <td>hits</td>
	<td>操作</td>
  </tr>
<?php
if ($pos =="bt")
{ $sql = "Select * From news where title like '%{$key}%' ";}
if ($pos =="nr")
{ $sql = "Select * From news where content like '%{$key}%' ";}
$queryset = mysql_query($sql); //执行SQL 语句
while($rs= mysql_fetch_array($queryset))
{
?>
  <tr bgcolor="#FFCCCC" align="left">
   <td width="39"  height="25"><?php echo $rs["NID"]; ?></td>
    <td width="364" height="25"> <a href="news_disp.php?xwh=<?php echo $rs["NID"]; ?>" target="_blank"><?php echo $rs["title"]; ?></a></td>
    <td width="103" height="25"><?php echo $rs["user"]; ?></td>
    <td width="103" height="25"><?php echo $rs["infotime"]; ?></td>
    <td width="61" height="25"><?php echo $rs["hits"]; ?></td>
	<td width="84"><a href="news_modi.php?xwh=<?php echo $rs["NID"]; ?> " target="_blank">修改</a>&nbsp;&nbsp;<a href="news_del.php?xwh=<?php echo $rs["NID"]; ?>">删除</a></td>
  </tr>
<?php
}
?>
   </table>

</body>
</html>
