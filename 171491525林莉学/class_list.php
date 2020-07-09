<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>新闻分类</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="535353" topmargin="0" leftmargin="0">
<?php 

include("connlj.php");//$db
include("top.php");
$ccc=$_GET["cn"];
?>


<table width="778" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#00CC99">
    <th colspan="5"><?php echo  $ccc?> </th>
  </tr>
  <tr bgcolor="#99FF00">
    <td width="44" align="center">nid</td>
    <td width="467" align="center">标题</td>
    <td width="85" align="center">作者</td>
    <td width="91" align="center">发布时间</td>
    <td width="71" align="center">点击率</td>
  </tr>
  
<?php
$sql = "Select * From news where bigclassname='$ccc'";
$rs=new com("adodb.recordset");
$rs->open($sql,$db,1,1);//执行语句,返回记录集
$rs->Pagesize=12;//设置每页记录行数
$pg=isset($_GET["page"])?$_GET["page"]:"1";
$rs->AbsolutePage=$pg;
$rn =1 ;
while((! $rs->eof)&&($rn<=$rs->Pagesize)){
?>
  <tr bgcolor="#FFFFFF" height="35">
    <td><?php echo $rs->Fields("nid")->value; ?></td>
    <td><a href="news_disp.php?xwh=<?php echo $rs->Fields("nid")->value; ?>" target="_blank" title="<?php echo $rs->Fields("title")->value; ?>"><?php echo $rs->Fields("title")->value; ?></a></td>
    <td><?php echo $rs->Fields("user")->value; ?></td>
    <td><?php echo $rs->Fields("infotime")->value; ?></td>
    <td><?php echo $rs->Fields("hits")->value; ?></td>
  </tr>
<?php
$rs->MoveNext(); 
$rn++;
}

?>
  
 
  
<tr bgcolor="#FF9933"><td colspan="5" align="center">
	总计:<?php echo $rs->RecordCount?>条；每页<?php echo $rs->Pagesize?>条；共<?php echo $rs->PageCount?>页；当前页:<?php echo $pg ?>

	</td></tr>
	<tr bgcolor="#FFFFFF"><td colspan="5" align="center" style="font-size:24px" >
	<?php for($n=1; $n<=$rs->PageCount; $n++) { ?>
		<a href="class_list.php?page=<?php echo $n ?>&&cn=<?php echo $ccc; ?>"> <?php echo $n ?> </a>&nbsp;
	<?php } ?>
	</td></tr>

</table>
<?php  $db->Close();$db =NULL;$rs=NULL   ?>
</body>
</html>
