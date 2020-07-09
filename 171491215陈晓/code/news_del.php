<?php
include("conn.php");
include("cookie_check.php");
$xwh=$_GET["xwh"];
$pg=$_GET["page"];
$sql="delete from news where nid=$xwh";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
if($result)
	{echo "<script>{alert('É¾³ý³É¹¦');document.location.href='admin_newslist.php?page=$pg'}</script>";}
else
{echo "<script>{window.alert('É¾³ýÊ§°Ü');history.back();}</script>";}
?>
