<?php 
include("connect.php");
$ID = $_GET["ID"];
$myquery = mysql_query("select * from shopping_cart where shopping_cart_ID=$ID",$db);
$row = mysql_fetch_array($myquery);
$f_ID = $row["fruit_ID"];
$num = $row["fruit_num"];
$myquery1 = mysql_query("select * from fruit where ID=$f_ID",$db);
$row1 = mysql_fetch_array($myquery1);
$num1 = $row1["num"];
$new_num = $num + $num1;
$sql1="update fruit set num='$new_num' where ID=$f_ID";
//echo $sql1;exit();
$result1 = mysql_query($sql1);
$sql="delete from shopping_cart where shopping_cart_ID=$ID";
$result = mysql_query($sql);
if($result)
    echo "<script>{alert('删除成功');document.location.href='shopping_cart_list.php'} </script>";
else 
    echo "<script>{alert('删除失败');history.back();} </script>";
//header("Location:index_access.php");//这是PHP的重新定向的一般方法
?>
