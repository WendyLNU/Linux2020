<?php 
include("conn.php");
$xm=$_POST["xm"];
$nxm=$_POST["nxm"];
$ops=$_POST["omm"];
$nps=$_POST["nmm"];
if($nxm=="")
{$nxm=$xm;}
$sql="update Admin set Admin='$nxm',password='$nps'where Admin='$xm'AND password='$ops'";
//echo $sql;exit();
$result = mysql_query($sql,$db);
//$result�ǲ����ͱ�����������ֵ������ʾ��ɾ���Ƿ�ɹ���
if($result)
    echo "<script>{alert('�޸ĳɹ�');location.href='admin_home.php'} </script>";
else 
    echo "<script>{alert('�޸�ʧ��');history.bal();} </script>";
//header("Location:index_access.php");//����PHP�����¶����һ�㷽��
?>