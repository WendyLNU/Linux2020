<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>历史</title>
</head>

<body>
<?php   
include("Conn.php");
$myquery = mysql_query("select count(*) from shudu",$db);
$row = mysql_fetch_array($myquery);
$num_cnt = $row[0];		
$page_size = 12;
$page_cnt = ceil($num_cnt / $page_size); 
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }
$query_start = ($page - 1) * $page_size;
$querysql = "Select * From shudu limit $query_start, $page_size";
$queryset = mysql_query($querysql); ?>
<table width="778" border="0" cellspacing="0" cellpadding="2" align="center" bgcolor="#999999">
  <tr>
    <td width="110" align="center">索引</td>
    <td width="102" align="center">数独</td>
    <td width="430" align="center">日期</td>
    <td width="120" align="center">删除</td>
  </tr>
<?php while($row = mysql_fetch_array($queryset))
{ ?>
<tr bgcolor="#FFFFFF">
    <td><?php echo $row["suyi"]; ?></td>
    <td><a href="ChaKan.php?syh=<?php echo $row["suyi"]; ?>" target="_blank">数独<?php echo $row["suyi"]; ?></a></td>
    <td><?php echo $row["riqi"]; ?></td>
    <td><a href="ShanChu.php?syh=<?php echo $row["suyi"] ?>" target="_blank">删除</a></td>
</tr>
<?php
	}
?>
<tr bgcolor="#33CCFF"><td colspan="7" align="center">
  总计:<?php echo $num_cnt ?>条；每页:<?php echo $page_size ?>条；共<?php echo $page_cnt ?>页；当前页:<?php echo $page ?>
  </td></tr>
	  <tr bgcolor="#FFFFFF"><td colspan="7" align="center" style="font-size:24px">
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
