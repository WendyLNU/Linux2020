<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���ﳵ</title>
</head>

<body background="image/18787709_145919198000_2.jpg" style="background-size:100% 100%">
<h1 align="center">�����嵥</h1>
<?php 
require("connect.php");
$myquery = mysql_query("select count(*) from shopping_cart",$db);
$row = mysql_fetch_array($myquery);
$num_cnt = $row[0];		
$page_size = 15; 		//ÿҳ��¼��15
$page_cnt = ceil($num_cnt / $page_size); 
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }
$query_start = ($page - 1) * $page_size; //����ÿҳ��ʼ�ļ�¼��
$querysql = "select * from shopping_cart limit $query_start, $page_size"; //ʹ��MySQL���е�limit�Ӿ��ȡ��¼
$queryset = mysql_query($querysql); //ִ��SQL ���
?>
<table width="600" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#FFCC00">
    <td width="32" height="23">ID</td>
    <td width="70">����</td>
    <td width="120">��Ǯ��Ԫ/���</td>
    <td width="133">�������������</td>
    <td width="213">����</td>
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
    <td><a href="shopping_cart_del.php?ID=<?php echo $row["shopping_cart_ID"]; ?>" title="�Ƴ�����Ʒ" target="_blank">�Ƴ�����Ʒ</a>&nbsp;&nbsp;<a href="shopping_one.php?ID=<?php echo $row["shopping_cart_ID"]; ?>" title="��������" target="_blank">����</a></td>
  </tr>
<?php
  }	
?>
  <tr bgcolor="#33CCFF"><td colspan="5" align="center">
  �ܼ�:<?php echo $num_cnt ?>����ÿҳ:<?php echo $page_size ?>������<?php echo $page_cnt ?>ҳ����ǰҳ:<?php echo $page ?>
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
<a href="shopping_cart_list.php?p=<?php echo $page ?>"> <?php echo "<center>".$pager . " ҳ</center>"; ?> </a>&nbsp;
<?php }?>
  </td></tr>
	  <tr bgcolor="#FFFFFF">
	    <td colspan="5" align="center" style="font-size:24px"><a href="shopping_all.php" title="ȫ������" target="_blank">ȫ������</a></td>
  </tr>
</table>
</body>
</html>
