<?php 
include("connect.php");
$ID = $_POST["ID"];
$name = $_POST["name"];
$price = $_POST["price"];
$lb = $_POST["lb"];
$yn = $_POST["yn"];
$num = $_POST["num"];
$sql="update fruit set name='$name',price='$price',lb='$lb',yn='$yn',num='$num' where ID=$ID";
//echo $sql;exit();
$result = mysql_query($sql);
//$result是布尔型变量，根据其值，可提示增删改是否成功！

if($result)
    echo "<script>{alert('修改成功');location.href='fruit_list.php'} </script>";
else 
    echo "<script>{alert('修改失败');history.back();} </script>";
?>
