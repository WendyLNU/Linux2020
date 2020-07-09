<?php 
include("connect.php");
$ID = $_POST["wid"];
$nr = $_POST["nr"];
$sql="update content set tcontent='$nr' where wid=$ID";
$result = mysql_query($sql);
if($result)
    echo "<script>{alert('回复成功');location.href='teacher.php'} </script>";
else 
    echo "<script>{alert('回复失败');history.back();} </script>";
?>
