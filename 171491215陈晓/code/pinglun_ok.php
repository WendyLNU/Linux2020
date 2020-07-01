<?php
include("conn.php");
include("cookie_check.php");
$pid=$_GET["pid"];
$sql="update shop_pinglun set pinglunok=True where pid=$pid";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
if($result)
	{echo "<script>{alert('审核通过，评论在评论区可见');document.location.href='pinglun_list.php'}</script>";}
else
{echo "<script>{window.alert('操作失败');history.back();}</script>";}
?>
