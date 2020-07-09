<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>新闻浏览</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="535353" topmargin="0" leftmargin="0">

<?php 
include("connlj.php");
include("top.php");
$xwid=$_GET["xwh"];
$sqlupd="update news set hits=hits+1  where nid=$xwid";
$db->Execute($sqlupd);



$sql = "Select * From news where nid=$xwid ";
$rs=new com("adodb.recordset");
$rs->open($sql,$db,1,1);//执行语句,返回记录集
?>
<table width="778" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#00CC99">
    <th><?php echo $rs->Fields("title")->value; ?></th>
  </tr>
  <tr bgcolor="#99FF00">
    <td>	
	新闻类别:<?php echo $rs->Fields("bigclassname")->value; ?><br>
	作者:<?php echo $rs->Fields("user")->value; ?><br>
	发布时间:<?php echo $rs->Fields("infotime")->value; ?><br>
	点击率:<?php echo $rs->Fields("hits")->value; ?>
	</td>
  </tr>
  <tr bgcolor="#CCFF66">
    <td><?php echo $rs->Fields("content")->value; ?></td>
  </tr>
</table>

<?php

$rs=NULL;//虽然PHP宣称会自动释放资源，但还是习惯地书写好！
?>


<table width="778" border="0" cellspacing="0" cellpadding="2" align="center" bgcolor="#FFFFFF">
  <tr>
    <td align="center" bgcolor="#00CC99">
	<img src="../images/my_review.gif" align="absmiddle">
	<a href="pinglun_add.php?xid=<?php echo $xwid ?>" target="_blank">发表评论</a>
	</td>
  </tr>
</table>


<table width="778" border="0" cellspacing="0" cellpadding="2" align="center" bgcolor="#FFFFFF">
<?php

$sqlpl = "Select * From shop_pinglun where nid=$xwid and pinglunok=1";
$rspl=new com("adodb.recordset");
$rspl->open($sqlpl,$db,1,1);//执行语句,返回记录集

while(! $rspl->eof)
{
?>

  <tr bgcolor="#FFFFFF">
    <td style="border-bottom:#FF0000 dotted 1px">
	评论人：<?php echo $rspl->Fields("pinglunname")->value; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    评论时间：<?php echo $rspl->Fields("pinglundate")->value; ?><br>
    <?php echo $rspl->Fields("pingluncontent")->value; ?>
	
	</td>
	
  </tr>
<?php
$rspl->MoveNext(); 
}
$db->Close();
$db =NULL;
$rspl=NULL;//虽然PHP宣称会自动释放资源，但还是习惯地书写好！
?>
</table>

</body>
</html>
