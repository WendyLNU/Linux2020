<?php
include("conn.php");
include("cookie_check.php");
$pid=$_GET["pid"];
$sql="update shop_pinglun set pinglunok=True where pid=$pid";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
if($result)
	{echo "<script>{alert('���ͨ�����������������ɼ�');document.location.href='pinglun_list.php'}</script>";}
else
{echo "<script>{window.alert('����ʧ��');history.back();}</script>";}
?>
