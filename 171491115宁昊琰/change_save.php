<?php 
include("connect.php");
$ID = $_POST["ID"];
$name = $_POST["name"];
$price = $_POST["price"];
$lb = $_POST["lb"];
$yn = $_POST["yn"];
$num = $_POST["num"];
$sql="update fruit set name='$name',price='$price',lb='$lb',yn='$yn',num='$num' where ID=$ID";
//echo $sql;exit();
$result = mysql_query($sql);
//$result�ǲ����ͱ�����������ֵ������ʾ��ɾ���Ƿ�ɹ���

if($result)
    echo "<script>{alert('�޸ĳɹ�');location.href='fruit_list.php'} </script>";
else 
    echo "<script>{alert('�޸�ʧ��');history.back();} </script>";
?>
