<?php 
include("connect.php");
session_start();
$customer_ID = $_SESSION["pass"];
$buy = 0;
$myquery = mysql_query("select * from shopping_cart where customer_ID = $customer_ID ",$db);
while ($row = mysql_fetch_array($myquery)){
	$buy += $row["fruit_price"] * $row["fruit_num"];
	$buy1 = $row["fruit_price"] * $row["fruit_num"];
	$c_ID = $row["customer_ID"];
	$name = $row["fruit_name"];
	$num = $row["fruit_num"];
	$price = $row["fruit_price"];
	$sql1="insert into sale (customer_ID,fruit_name,fruit_num,fruit_price,money) values ('$c_ID','$name','$num','$price','$buy1')";
	$result1 = mysql_query($sql1);}
?>
<h1 align="center">你一共需要支付<?php echo $buy; ?>元，货到付款。</h1>
<?php
$sql="delete from shopping_cart where customer_ID = $customer_ID";
$result = mysql_query($sql);
if($result)
    echo "<script>{alert('购买成功');} </script>";
else 
    echo "<script>{alert('购买失败');history.back();} </script>";
//header("Location:index_access.php");//这是PHP的重新定向的一般方法
?>