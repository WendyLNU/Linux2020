<?php 
session_start();
include("connect.php");
$nrnr = $_POST["nr"];
$cid = $_SESSION["cidcid"];
$sql="insert into content (cid,scontent) values('$cid','$nrnr')";
//echo $sql;exit();
$result = mysql_query($sql);
//$result是布尔型变量，根据其值，可提示增删改是否成功！

if($result)
    echo "<script>{alert('留言成功');location.href='student.php'} </script>";
else 
    echo "<script>{alert('留言失败');history.back();} </script>";
?>