<?php 
include("conn.php");
$xwh=$_POST["xwh"];
$pg=$_POST["pg"];
$bbtt=$_POST["bt"];
$zzzz=$_POST["zz"];
$lblb=$_POST["lb"];
$sjsj=$_POST["sj"];
$nrnr=$_POST["nr"];
$sql="update news set title='$bbtt',user='$zzzz',bigclassname='$lblb',infotime='$sjsj',content='$nrnr'where nid=$xwh";
//echo $sql;exit();
$result = mysql_query($sql,$db) OR die (mysql_error($db));
//$result�ǲ����ͱ�����������ֵ������ʾ��ɾ���Ƿ�ɹ���
if($result)
    echo "<script>{alert('�޸ĳɹ�');location.href='admin_newslist.php'} </script>";
else 
    echo "<script>{alert('�޸�ʧ��');history.bal();} </script>";
//header("Location:index_access.php");//����PHP�����¶����һ�㷽��
?>
