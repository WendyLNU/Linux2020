<?php 
session_start();
include("connect.php");
$nrnr = $_POST["nr"];
$cid = $_SESSION["cidcid"];
$sql="insert into content (cid,scontent) values('$cid','$nrnr')";
//echo $sql;exit();
$result = mysql_query($sql);
//$result�ǲ����ͱ�����������ֵ������ʾ��ɾ���Ƿ�ɹ���

if($result)
    echo "<script>{alert('���Գɹ�');location.href='student.php'} </script>";
else 
    echo "<script>{alert('����ʧ��');history.back();} </script>";
?>