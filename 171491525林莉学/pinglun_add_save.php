<?php 
include("connlj.php");
$nid=$_POST["nid"];
$zz=$_POST["zz"];
$sj=$_POST["sj"];
$nr=$_POST["nr"];
$sql="insert into shop_pinglun (nid,pinglunname,pinglundate,pingluncontent,pinglunok) values('$nid','$zz','$sj','$nr',0)";
$result=$db->Execute($sql);
//$result�ǲ����ͱ�����������ֵ������ʾ��ɾ���Ƿ�ɹ���
if($result)
    echo "<script>{window.alert('���۳ɹ�����ȴ�����Ա���Ŷ');location.href='news_disp.php?xwh=$nid'} </script>";
else 
    echo "<script>{window.alert('�޸�ʧ��');history.bck();} </script>";

?>
