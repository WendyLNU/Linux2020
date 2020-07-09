<?php 
include("connect.php");
$ID = $_POST["ID"];
$shopping_num = $_POST["shopping_num"];
$price = $_POST["price"];
session_start();
$c_ID = $_SESSION["pass"];
$name = $_POST["name"];
$myquery = mysql_query("select * from fruit where ID=$ID");
$row = mysql_fetch_array($myquery);
$num = $row["num"];
$new_num = $num - $shopping_num;
if($new_num<0){echo "<script>{alert('添加失败');history.back();} </script>";exit();}
$sql="insert into shopping_cart (customer_ID,fruit_ID,fruit_num,fruit_price,fruit_name) values('$c_ID','$ID','$shopping_num','$price','$name')";
$sql1 = "update fruit set num='$new_num' where ID=$ID";
$result1 = mysql_query($sql1);
//echo $sql;exit();
$result = mysql_query($sql);
//$result是布尔型变量，根据其值，可提示增删改是否成功！

if($result)
    echo "<script>{alert('添加成功');location.href='fruit_list_C.php'} </script>";
else 
    echo "<script>{alert('添加失败');history.back();} </script>";
?>