<?php 
include("connect.php");
$ID = $_GET["ID"];
$sql="delete from fruit where ID=$ID";
$result = mysql_query($sql);
if($result)
    echo "<script>{alert('ɾ���ɹ�');document.location.href='fruit_list.php'} </script>";
else 
    echo "<script>{alert('ɾ��ʧ��');history.back();} </script>";
//header("Location:index_access.php");//����PHP�����¶����һ�㷽��
?>