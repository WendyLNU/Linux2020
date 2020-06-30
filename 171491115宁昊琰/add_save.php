<?php 
include("connect.php");
$name = $_POST["name"];
$price = $_POST["price"];
$lb = $_POST["lb"];
$yn = $_POST["yn"];
$num = $_POST["num"];
$sql="insert into fruit (name,price,lb,yn,num) values('$name','$price','$lb','$yn','$num')";
//echo $sql;exit();
$result = mysql_query($sql);
//$result是布尔型变量，根据其值，可提示增删改是否成功！

if($result)
    echo "<script>{alert('添加成功');location.href='fruit_list.php'} </script>";
else 
    echo "<script>{alert('添加失败');history.back();} </script>";
?>