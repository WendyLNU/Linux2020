<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>购物车</title>
</head>

<body background="image/18787709_145919198000_2.jpg" style="background-size:100% 100%">
<h1 align="center">购物清单</h1>
<?php 
require("connect.php");
$myquery = mysql_query("select count(*) from shopping_cart",$db);
$row = mysql_fetch_array($myquery);
$num_cnt = $row[0];		
$page_size = 15; 		//每页记录数15
$page_cnt = ceil($num_cnt / $page_size); 
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }
$query_start = ($page - 1) * $page_size; //计算每页开始的记录号
$querysql = "select * from shopping_cart limit $query_start, $page_size"; //使用MySQL独有的limit子句获取记录
$queryset = mysql_query($querysql); //执行SQL 语句
?>
<table width="600" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#FFCC00">
    <td width="32" height="23">ID</td>
    <td width="70">名称</td>
    <td width="120">价钱（元/公斤）</td>
    <td width="133">购买数量（公斤）</td>
    <td width="213">操作</td>
  </tr>
<?php
while($row = mysql_fetch_array($queryset))
  { 
?>
  <tr bgcolor="#FFFFCC">
    <td><?php echo $row["shopping_cart_ID"]; ?></td>
    <td><?php echo $row["fruit_name"]; ?></td>
    <td><?php echo $row["fruit_price"]; ?></td>
    <td><?php echo $row["fruit_num"]; ?></td>
    <td><a href="shopping_cart_del.php?ID=<?php echo $row["shopping_cart_ID"]; ?>" title="移除此商品" target="_blank">移除此商品</a>&nbsp;&nbsp;<a href="shopping_one.php?ID=<?php echo $row["shopping_cart_ID"]; ?>" title="单独结算" target="_blank">结算</a></td>
  </tr>
<?php
  }	
?>
  <tr bgcolor="#33CCFF"><td colspan="5" align="center">
  总计:<?php echo $num_cnt ?>条；每页:<?php echo $page_size ?>条；共<?php echo $page_cnt ?>页；当前页:<?php echo $page ?>
  </td></tr>
	  <tr bgcolor="#FFFFFF"><td colspan="5" align="center" style="font-size:24px">
<?php
$pager="" ;
if($page_cnt > 1){
	for($i=1; $i <= $page_cnt; $i++){
		if($page==$i){
			$pager.="<B>$i</B> ";
			}
		else{
			$pager.="<a href='?p=$i'>$i</a> ";
			}
		}
?>
<a href="shopping_cart_list.php?p=<?php echo $page ?>"> <?php echo "<center>".$pager . " 页</center>"; ?> </a>&nbsp;
<?php }?>
  </td></tr>
	  <tr bgcolor="#FFFFFF">
	    <td colspan="5" align="center" style="font-size:24px"><a href="shopping_all.php" title="全部结算" target="_blank">全部结算</a></td>
  </tr>
</table>
</body>
</html>
