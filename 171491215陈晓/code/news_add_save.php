<?php 
include("conn.php");
$bbtt=$_POST["bt"];
$zzzz=$_POST["zz"];
$lblb=$_POST["lb"];
$sjsj=$_POST["sj"];
$nrnr=$_POST["nr"];
$sql="insert into News(title,user,bigclassname,infotime,content,hits) values('$bbtt','$zzzz','$lblb','$sjsj','$nrnr',0)";
//echo $sql;exit();
$result = mysql_query($sql,$db) OR die (mysql_error($db));
//$result�ǲ����ͱ�����������ֵ������ʾ��ɾ���Ƿ�ɹ���
if($result)
    echo "<script>{alert('��ӳɹ�');location.href='admin_newslist.php'} </script>";
else 
    echo "<script>{alert('���ʧ��');history.bal();} </script>";
//header("Location:index_access.php");//����PHP�����¶����һ�㷽��
?>
