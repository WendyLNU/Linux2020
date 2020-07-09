<?php 
include("connect.php");
$ID = $_GET["ID"];
$sql="delete from fruit where ID=$ID";
$result = mysql_query($sql);
if($result)
    echo "<script>{alert('删除成功');document.location.href='fruit_list.php'} </script>";
else 
    echo "<script>{alert('删除失败');history.back();} </script>";
//header("Location:index_access.php");//这是PHP的重新定向的一般方法
?>