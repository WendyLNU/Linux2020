<?php 
include("connect.php");
$ID = $_POST["wid"];
$nr = $_POST["nr"];
$sql="update content set tcontent='$nr' where wid=$ID";
$result = mysql_query($sql);
if($result)
    echo "<script>{alert('�ظ��ɹ�');location.href='teacher.php'} </script>";
else 
    echo "<script>{alert('�ظ�ʧ��');history.back();} </script>";
?>
