<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Ա������ҳ��</title>
</head>

<body background="image/5b89125b77429_610.jpg" style="background-size:100% 100%">
<?php header("Content-type:text/html;charset=gb2312");?>
<br/>
<h1 align="center"><font color="#333366">��Ҫ��ʲô��</font></h1><br>
<h3 align="center"><a href="fruit_sale.php" title="�鿴�������" target="_self">1.�鿴�������</a>   </h3><br>
<h3 align="center"><a href="fruit_list.php" title="�鿴��棨�޸Ŀ�棩" target="_self">2.�鿴������Ʒ��棨������ɾ������Ʒ��</a></h3><br>
<h3 align="center"><a href="fruit_add.php" title="�����Ʒ" target="_self">3.�������Ʒ</a>   </h3><br>
<h1 align="center">��Ҫ��������Ʒ�嵥�����С��100��</h1>
<?php 
require("connect.php");
$myquery = mysql_query("select count(*) from fruit where num<100",$db);
$row = mysql_fetch_array($myquery);
$num_cnt = $row[0];		
$page_size = 15; 		//ÿҳ��¼��15
$page_cnt = ceil($num_cnt / $page_size); 
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }
$query_start = ($page - 1) * $page_size; //����ÿҳ��ʼ�ļ�¼��
$querysql = "select * from fruit where num<100 limit $query_start, $page_size"; //ʹ��MySQL���е�limit�Ӿ��ȡ��¼
$queryset = mysql_query($querysql); //ִ��SQL ���
?>
<table width="745" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#FFCC00">
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
  <tr bgcolor="#FFFFCC">
    <td><?php echo $row["ID"]; ?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["price"]; ?></td>
    <td><?php echo $row["lb"]; ?></td>
    <td><?php echo $row["yn"]; ?></td>
    <td><?php echo $row["num"]; ?></td>
    <td><a href="fruit_change.php?ID=<?php echo $row["ID"]; ?>" title="�޸���Ʒ" target="_blank">�޸���Ʒ</a>&nbsp;&nbsp;&nbsp;<a href="fruit_del.php?ID=<?php echo $row["ID"]; ?>" title="ɾ����Ʒ" target="_blank">ɾ����Ʒ</a></td>
  </tr>
<?php
  }	
?>
  <tr bgcolor="#33CCFF"><td colspan="7" align="center">
  �ܼ�:<?php echo $num_cnt ?>����ÿҳ:<?php echo $page_size ?>������<?php echo $page_cnt ?>ҳ����ǰҳ:<?php echo $page ?>
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
<a href="manager.php?p=<?php echo $page ?>"> <?php echo "<center>".$pager . " ҳ</center>"; ?> </a>&nbsp;
<?php }?>
  </td></tr>
</table>
</body>
</html>
