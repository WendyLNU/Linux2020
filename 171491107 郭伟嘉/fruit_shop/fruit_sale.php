<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>已经销售的商品清单</title>
</head>

<body background="image/18787709_145919198000_2.jpg" style="background-size:100% 100%">
<h1 align="center">已经销售的商品清单</h1>
<?php 
require("connect.php");
$myquery = mysql_query("select count(*) from sale",$db);
$row = mysql_fetch_array($myquery);
$num_cnt = $row[0];		
$page_size = 15; 		//每页记录数15
$page_cnt = ceil($num_cnt / $page_size); 
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }
$query_start = ($page - 1) * $page_size; //计算每页开始的记录号
$querysql = "select * from sale limit $query_start, $page_size"; //使用MySQL独有的limit子句获取记录
$queryset = mysql_query($querysql); //执行SQL 语句
?>
<table width="745" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#FFCC00">
    <td width="37" height="23">ID</td>
    <td width="143">顾客账号</td>
    <td width="138">名称</td>
    <td width="98">价钱</td>
    <td width="133">数量</td>
    <td width="158">金额</td>
  </tr>
<?php
while($row = mysql_fetch_array($queryset))
  { 
?>
  <tr bgcolor="#FFFFCC">
    <td><?php echo $row["sale_ID"]; ?></td>
    <td><?php echo $row["customer_ID"]; ?></td>
    <td><?php echo $row["fruit_name"]; ?></td>
    <td><?php echo $row["fruit_price"]; ?></td>
    <td><?php echo $row["fruit_num"]; ?></td>
    <td><?php echo $row["money"]; ?></td>
  </tr>
<?php
  }	
?>
  <tr bgcolor="#33CCFF"><td colspan="6" align="center">
  总计:<?php echo $num_cnt ?>条；每页:<?php echo $page_size ?>条；共<?php echo $page_cnt ?>页；当前页:<?php echo $page ?>
  </td></tr>
	  <tr bgcolor="#FFFFFF"><td colspan="6" align="center" style="font-size:24px">
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
<a href="fruit_list.php?p=<?php echo $page ?>"> <?php echo "<center>".$pager . " 页</center>"; ?> </a>&nbsp;
<?php }?>
  </td></tr>
</table>
</body>
</html>