<?php 
include("connect.php");
$cid = $_POST["cid"];
$name = $_POST["name"];
$nr = $_POST["nr"];
$rq = $_POST["rq"];
$sql="insert into homework (cid,title,content,deadline) values('$cid','$name','$nr','$rq')";
//echo $sql;exit();
$result = mysql_query($sql);
//$result是布尔型变量，根据其值，可提示增删改是否成功！

if($result)
    echo "<script>{alert('添加成功');location.href='teacher.php'} </script>";
else 
    echo "<script>{alert('添加失败');history.back();} </script>";
?>