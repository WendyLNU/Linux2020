<?php 
include("connect.php");
$name = $_POST["name"];
$price = $_POST["price"];
$lb = $_POST["lb"];
$yn = $_POST["yn"];
$num = $_POST["num"];
$sql="insert into fruit (name,price,lb,yn,num) values('$name','$price','$lb','$yn','$num')";
//echo $sql;exit();
$result = mysql_query($sql);
//$result�ǲ����ͱ�����������ֵ������ʾ��ɾ���Ƿ�ɹ���

if($result)
    echo "<script>{alert('��ӳɹ�');location.href='fruit_list.php'} </script>";
else 
    echo "<script>{alert('���ʧ��');history.back();} </script>";
?>