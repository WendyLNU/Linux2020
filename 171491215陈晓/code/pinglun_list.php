<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>评论管理</title>
</head>
<body bgcolor="#FF99CC">
<h1 align="center">评论列表</h1>
<table width="778" height="125" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <th colspan="3" align="center">待审核</th>
  </tr>
<?php
include("conn.php");
include("cookie_check.php");
$sqlpl = "Select * From shop_pinglun where  pinglunok=0 order by pinglundate";
$queryset = mysql_query($sqlpl); 
$lc=1;
while($rspl= mysql_fetch_array($queryset))
{
?>  
  <tr>
    <td width="374" >题目标题：
	<?php 
	$NID=$rspl["NID"];
	$sql = "Select title From news where  NID=$NID";
	$res = mysql_query($sql,$db) OR die (mysql_error($db));
	$rs = mysql_fetch_array($res);//执行语句,返回记录集
	echo $rs["title"]; 
	$rs=NULL;
	?>
	<br>
	</td>
    <td width="145" >评论人:<?php echo $rspl["pinglunname"]; ?></td>
    <td width="151" ><?php echo Date("Y年m月d日",StrToTime($rspl["pinglundate"]))?></td>
	<td width="92" ><a href="pinglun_ok.php?pid=<?php echo $rspl["pid"];?>">通过</a>   <a href="pinglun_del.php?pid=<?php echo $rspl["pid"];?>">删除</a></td>
  </tr>
    <tr>
    <td colspan="4" style="border-bottom: #FF0000 dashed 1px">评论内容：<?php echo $rspl["pingluncontent"]; ?></td>
  </tr>
<?php
$lc++;
}
$rspl=NULL;
?>
  <tr>
    <th colspan="3" align="center">审核通过</th>
  </tr>
<?php
include("cookie_check.php");
$sqlpl = "Select * From shop_pinglun where  pinglunok order by pinglundate ";
$queryset = mysql_query($sqlpl); 
$lc=1;
while($rspl= mysql_fetch_array($queryset))
{
?>  
  <tr>
    <td width="374" >题目标题：
	<?php 
	$NID=$rspl["NID"];
	$sql = "Select title From news where  NID=$NID";
	$res = mysql_query($sql,$db) OR die (mysql_error($db));
	$rs = mysql_fetch_array($res);//执行语句,返回记录集
	echo $rs["title"]; 
	$rs=NULL;
	?>
	<br>
	</td>
    <td width="145" >评论人:<?php echo $rspl["pinglunname"]; ?></td>
    <td width="151" ><?php echo Date("Y年m月d日",StrToTime($rspl["pinglundate"]))?></td>
	<td width="92" ><a href="pinglun_ok.php?pid=<?php echo $rspl["pid"];?>">通过</a>   <a href="pinglun_del.php?pid=<?php echo $rspl["pid"];?>">删除</a></td>
  </tr>
    <tr>
    <td colspan="4" style="border-bottom: #FF0000 dashed 1px">评论内容：<?php echo $rspl["pingluncontent"]; ?></td>
  </tr>
<?php
$lc++;
}
$rspl=NULL;
?>
</table>
</body>
</html>
