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
//$result是布尔型变量，根据其值，可提示增删改是否成功！
if($result)
    echo "<script>{alert('修改成功');location.href='admin_home.php'} </script>";
else 
    echo "<script>{alert('修改失败');history.bal();} </script>";
//header("Location:index_access.php");//这是PHP的重新定向的一般方法
?>