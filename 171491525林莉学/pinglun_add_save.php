<?php 
include("connlj.php");
$nid=$_POST["nid"];
$zz=$_POST["zz"];
$sj=$_POST["sj"];
$nr=$_POST["nr"];
$sql="insert into shop_pinglun (nid,pinglunname,pinglundate,pingluncontent,pinglunok) values('$nid','$zz','$sj','$nr',0)";
$result=$db->Execute($sql);
//$result是布尔型变量，根据其值，可提示增删改是否成功！
if($result)
    echo "<script>{window.alert('评论成功，请等待管理员审核哦');location.href='news_disp.php?xwh=$nid'} </script>";
else 
    echo "<script>{window.alert('修改失败');history.bck();} </script>";

?>
