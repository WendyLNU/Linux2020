<?php 
include("conn.php");
$xm=$_POST["adname"];
$ps=$_POST["admm"];
$sql="select * from Admin where admin='$xm' AND password='$ps'";
//echo $sql;exit();
$result = mysql_query($sql,$db) OR die (mysql_error($db));
$row = mysql_fetch_array($result);
if($row)
{	foreach ($_COOKIE as $key => $value)
 	{
 		setcookie($key,"",time()-1);
 	}
	setcookie("adname",$xm);
	setcookie("password",$ps);
	echo "<script>{alert('��¼�ɹ�');location.href='admin_home.php';} </script>";}
else 
    echo "<script>{alert('�û���/����������������Ի���ϵ����Ա');location.href='default.php';} </script>";
//header("Location:index_access.php");//����PHP�����¶����һ�㷽��
?>