<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��Ʒ�嵥</title>
</head>

<body background="image/18787709_145919198000_2.jpg" style="background-size:100% 100%">
<div id="d1" style=" position:absolute;top:200px;left:400px; background-color:#C8C1D5" >
<h1 align="center">��Ʒ�嵥</h1>
<?php 
require("connect.php");
$myquery = mysql_query("select count(*) from fruit where lb='ˮ��'",$db);
$row = mysql_fetch_array($myquery);
$num_cnt = $row[0];		
$page_size = 15; 		//ÿҳ��¼��15
$page_cnt = ceil($num_cnt / $page_size); 
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }
$query_start = ($page - 1) * $page_size; //����ÿҳ��ʼ�ļ�¼��
$querysql = "select * from fruit where lb='ˮ��' limit $query_start, $page_size"; //ʹ��MySQL���е�limit�Ӿ��ȡ��¼
$queryset = mysql_query($querysql); //ִ��SQL ���
?>
<table width="745" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#FFCCFF">
    <td width="37" height="23">ID</td>
    <td width="87">����</td>
    <td width="146">��Ǯ��Ԫ/���</td>
    <td width="83">���</td>
    <td width="65">�Ƿ��ؼ�</td>
    <td width="128">ʣ�����������</td>
    <td width="155">����</td>
  </tr>
<?php
while($row = mysql_fetch_array($queryset))
  { 
?>
  <tr bgcolor="#CC99CC">
    <td><?php echo $row["ID"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["price"]; ?></td>
    <td><?php echo $row["lb"]; ?></td>
    <td><?php echo $row["yn"]; ?></td>
    <td><?php echo $row["num"]; ?></td>
    <td><a href="shopping_cart.php?ID=<?php echo $row["ID"]; ?>" title="�������Ʒ" target="_self">���빺�ﳵ</a></td>
  </tr>
<?php
  }	
?>
  <tr bgcolor="#FFCCFF"><td colspan="7" align="center">
  �ܼ�:<?php echo $num_cnt ?>����ÿҳ:<?php echo $page_size ?>������<?php echo $page_cnt ?>ҳ����ǰҳ:<?php echo $page ?>
  </td></tr>
	  <tr bgcolor="#CCCCFF"><td colspan="7" align="center" style="font-size:24px">
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
<a href="fruit_list_C.php?p=<?php echo $page ?>"> <?php echo "<center>".$pager . " ҳ</center>"; ?> </a>&nbsp;
<?php }?>
  </td></tr>
</table>
</div>
</body>
</html>
