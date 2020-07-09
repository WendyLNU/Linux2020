<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>商品清单</title>
</head>

<body background="image/0021033862421953_b.jpg" style="background-size:100% 100%">
<font style="position:absolute; top:100px;left:700px;" size="+4">商品清单</font>
<?php 
require("connect.php");
$myquery = mysql_query("select count(*) from fruit where yn = 1",$db);
$row = mysql_fetch_array($myquery);
$num_cnt = $row[0];		
$page_size = 15; 		//每页记录数15
$page_cnt = ceil($num_cnt / $page_size); 
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }
$query_start = ($page - 1) * $page_size; //计算每页开始的记录号
$querysql = "select * from fruit where yn = 1 limit $query_start, $page_size"; //使用MySQL独有的limit子句获取记录
$queryset = mysql_query($querysql); //执行SQL 语句
?>
<table width="745" border="1" cellspacing="0" cellpadding="2" style="position:absolute; top:200px;left:400px;">
  <tr bgcolor="#33FF66">
    <td width="37" height="23">ID</td>
    <td width="87">名称</td>
    <td width="146">价钱（元/公斤）</td>
    <td width="83">类别</td>
    <td width="65">是否特价</td>
    <td width="128">剩余数量（公斤）</td>
    <td width="155">操作</td>
  </tr>
<?php
while($row = mysql_fetch_array($queryset))
  { 
?>
  <tr bgcolor="#FFFFCC">
    <td><?php echo $row["ID"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["price"]; ?></td>
    <td><?php echo $row["lb"]; ?></td>
    <td><?php echo $row["yn"]; ?></td>
    <td><?php echo $row["num"]; ?></td>
    <td><a href="shopping_cart.php?ID=<?php echo $row["ID"]; ?>" title="购买此商品" target="_blank">加入购物车</a></td>
  </tr>
<?php
  }	
?>
  <tr bgcolor="#33CCFF"><td colspan="7" align="center">
  总计:<?php echo $num_cnt ?>条；每页:<?php echo $page_size ?>条；共<?php echo $page_cnt ?>页；当前页:<?php echo $page ?>
  </td></tr>
	  <tr bgcolor="#FF9999"><td colspan="7" align="center" style="font-size:24px">
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
<a href="fruit_list_off.php?p=<?php echo $page ?>"> <?php echo "<center>".$pager . " 页</center>"; ?> </a>&nbsp;
<?php }?>
  </td></tr>
</table>
</body>
</html>