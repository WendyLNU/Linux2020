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
<h1 align="center">��һ����Ҫ֧��<?php echo $buy; ?>Ԫ���������</h1>
<?php
$sql="delete from shopping_cart where customer_ID = $customer_ID";
$result = mysql_query($sql);
if($result)
    echo "<script>{alert('����ɹ�');} </script>";
else 
    echo "<script>{alert('����ʧ��');history.back();} </script>";
//header("Location:index_access.php");//����PHP�����¶����һ�㷽��
?>