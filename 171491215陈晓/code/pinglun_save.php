<?php 
include("conn.php");
$xm=$_POST["pinglunxm"];
$nr=$_POST["pinglunnr"];
$sj=date('y-m-d h:i:s',time());
var_dump($sj);
$xwh=$_POST["xwh"];
$sql="insert into shop_pinglun(NID,pinglunname,pinglundate,pingluncontent) values('$xwh','$xm','$sj','$nr')";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
//$result是布尔型变量，根据其值，可提示增删改是否成功！
if($result)
    echo "<script>{alert('评论发表成功，请等候管理员审核   $sj');location.href='news_disp.php?xwh=$xwh'} </script>";
else 
    echo "<script>{alert('评论发表失败失败，请联系管理员    $sj');history.bal();} </script>";
//header("Location:index_access.php");//这是PHP的重新定向的一般方法
?>
