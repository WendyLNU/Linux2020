<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>新闻浏览</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#FFFFCC">
<?php
include("conn.php");
include("top.php");
$xwid=$_GET["xwh"];
$sqlupd="update news set hits=hits+1 where nid=$xwid";
$result = mysql_query($sqlupd,$db) OR die (mysql_error($db));
$sql = "Select  * From news where nid=$xwid";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
$rs= mysql_fetch_array($result);//执行语句,返回记录集
?>
<table width="778" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#FF66CC">
    <th><?php echo $rs["title"];?></th>
  </tr>
  <tr bgcolor="#FF99CC">
    <td>
	新闻类别：<?php echo $rs["bigclassname"];?><br>
	作者：<?php echo $rs["user"];?><br>
	发布时间：<?php echo $rs["infotime"];?><br>
	点击率：<?php echo $rs["hits"];?><br>
	</td> 
  </tr>
  <tr bgcolor="#FFCCCC">
    <td><?php echo $rs["content"];?></td>
  </tr>
</table>
<table width="778" height="125" border="0" align="center" cellpadding="2" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <th colspan="3" align="center">评论区</th>
  </tr>
<?php

$sqlpl = "Select * From shop_pinglun where  pinglunok AND NID=$xwid order by pinglundate";
$result = mysql_query($sqlpl,$db) OR die (mysql_error($db));

$lc=1;
while($rspl = mysql_fetch_array($result))
{
?>  
  <tr>
    <td width="112"><img src="images/indict1.gif"><?php echo $lc; ?>楼</td>
    <td width="438">评论人:<?php echo $rspl["pinglunname"]; ?></td>
    <td width="216">评论时间:<?php echo Date("Y年m月d日",StrToTime($rspl["pinglundate"]))?></td>
  </tr>
    <tr>
    <td colspan="3" style="border-bottom:dashed 1px"><?php echo $rspl["pingluncontent"]; ?></td>
  </tr>
<?php

$lc++;
}
$rspl=NULL;
?>
<form action="pinglun_save.php" method="post" name="formpinglun" onSubmit="return CheckFormpinglun();">
  <tr>
    <td colspan="3" align="center">发表你的评论</td>
  </tr>
  <tr>
    <td bgcolor="#66CCFF">姓名</td>
    <td colspan="2"><input name="pinglunxm" type="text" size="60" maxlength="20"></td>
  </tr>
  <tr>
    <td bgcolor="#66CCFF">评论内容</td>
    <td colspan="2"><textarea name="pinglunnr" cols="100" rows="10"></textarea></td>
  </tr>
  <tr>
    <td colspan="3" align="center"><input name="tj" type="submit" value="发表">&nbsp;<input name="qx" type="button" value="取消"></a></td>
  </tr>
    <input name="xwh" type="hidden" value=<?php echo "$xwid";?>>
</form>
</table>
<script language="javascript">
function CheckFormpinglun()
{
	if(document.formpinglun.pinglunxm.value.trim()=="")
	{	alert("请输入姓名");
		document.formpinglun.pinglunxm.focus();
		return false;
	}
	if(document.formpinglun.pinglunnr.value.trim()=="")
	{	alert("请输入内容");
		document.formpinglun.pinglunnr.focus();
		return false;
	}
	return true;
}
</script>
</body>
</html>
