<?php
include("conn.php");
include("cookie_check.php");
$pid=$_GET["pid"];
$sql="delete from shop_pinglun where pid=$pid";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
if($result)
	{echo "<script>{alert('ɾ���ɹ�');document.location.href='pinglun_list.php'}</script>";}
else
{echo "<script>{window.alert('ɾ��ʧ��');history.back();}</script>";}
?>
