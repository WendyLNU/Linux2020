<?php 
include("connect.php");
$ID = $_GET["wid"];
$sql="delete from content where wid=$ID";
$result = mysql_query($sql);
if($result)
    echo "<script>{alert('ɾ���ɹ�');document.location.href='teacher.php'} </script>";
else 
    echo "<script>{alert('ɾ��ʧ��');history.back();} </script>";
//header("Location:index_access.php");//����PHP�����¶����һ�㷽��
?>
