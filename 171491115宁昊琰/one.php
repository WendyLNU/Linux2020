<?php 
include("connect.php");
$ID = $_GET["ID"];
$myquery = mysql_query("select * from shopping_cart where shopping_cart_ID=$ID",$db);
$row = mysql_fetch_array($myquery);
$buy = $row["fruit_price"] * $row["fruit_num"];
$c_ID = $row["customer_ID"];
$name = $row["fruit_name"];
$num = $row["fruit_num"];
$price = $row["fruit_price"];
$sql1="insert into sale (customer_ID,fruit_name,fruit_num,fruit_price,money) values ('$c_ID','$name','$num','$price','$buy')";
$result1 = mysql_query($sql1);
//echo $result1;exit();
?>
<h1 align="center">��һ����Ҫ֧��<?php echo $buy; ?>Ԫ���������</h1>
<?php
$sql="delete from shopping_cart where shopping_cart_ID=$ID";
$result = mysql_query($sql);
if($result)
    echo "<script>{alert('����ɹ�');} </script>";
else 
    echo "<script>{alert('����ʧ��');history.back();} </script>";
?>