<?php 
include("conn.php");
$xm=$_POST["pinglunxm"];
$nr=$_POST["pinglunnr"];
$sj=date('y-m-d h:i:s',time());
var_dump($sj);
$xwh=$_POST["xwh"];
$sql="insert into shop_pinglun(NID,pinglunname,pinglundate,pingluncontent) values('$xwh','$xm','$sj','$nr')";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
//$result�ǲ����ͱ�����������ֵ������ʾ��ɾ���Ƿ�ɹ���
if($result)
    echo "<script>{alert('���۷���ɹ�����Ⱥ����Ա���   $sj');location.href='news_disp.php?xwh=$xwh'} </script>";
else 
    echo "<script>{alert('���۷���ʧ��ʧ�ܣ�����ϵ����Ա    $sj');history.bal();} </script>";
//header("Location:index_access.php");//����PHP�����¶����һ�㷽��
?>
