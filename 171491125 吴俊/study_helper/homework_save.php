<?php 
include("connect.php");
$cid = $_POST["cid"];
$name = $_POST["name"];
$nr = $_POST["nr"];
$rq = $_POST["rq"];
$sql="insert into homework (cid,title,content,deadline) values('$cid','$name','$nr','$rq')";
//echo $sql;exit();
$result = mysql_query($sql);
//$result�ǲ����ͱ�����������ֵ������ʾ��ɾ���Ƿ�ɹ���

if($result)
    echo "<script>{alert('��ӳɹ�');location.href='teacher.php'} </script>";
else 
    echo "<script>{alert('���ʧ��');history.back();} </script>";
?>