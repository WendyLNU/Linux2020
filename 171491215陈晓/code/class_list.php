<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���ŷ���</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#FFFFCC" topmargin="0" leftmargin="0">

<?php
include("conn.php");
include("top.php");
$ccc=$_GET["cn"];
?>
<table width="778" height="99" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
	<th colspan="5" bgcolor="#FF66CC"  align="center"><?php echo $ccc;?></th>
  </tr>
    <tr bgcolor=" #FF99CC" align="left">
    <td height="34">NID</td>
    <td>����</td>
    <td>����</td>
    <td>ʱ��</td>
    <td>hits</td>
  </tr>
  <?php
  $myquery = mysql_query("Select * From news where bigclassname='$ccc'",$db);
  $row = mysql_fetch_array($myquery);
$num_cnt = $row[0];		//��ȡ������
$page_size = 15; 		//ÿҳ��¼��15
$page_cnt = ceil($num_cnt / $page_size); //������ҳ��
//�޲���ִ��ʱ�����õ�һҳΪ��ǰҳ
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }

$query_start = ($page - 1) * $page_size; //����ÿҳ��ʼ�ļ�¼��
$querysql = "Select * From news where bigclassname='$ccc' limit $query_start, $page_size"; //ʹ��MySQL���е�limit�Ӿ��ȡ��¼
$queryset = mysql_query($querysql); //ִ��SQL ���
while($row = mysql_fetch_array($queryset))
	{ //ѭ����ȡ�����
	?>
	  <tr bgcolor="#FFCCCC" align="left">
	<td width="42"  height="25"> <?php echo $row["NID"]; ?> </td>;
	 <td width="428" height="25"> <a href="news_disp.php?xwh=<?php echo $row["NID"]; ?>" target="_blank"><?php echo $row["title"]; ?></a></td>
    <td width="107" height="25"><?php echo $row["user"]; ?></td>
    <td width="113" height="25"><?php echo $row["infotime"]; ?></td>
    <td width="68" height="25"><?php echo $row["hits"]; ?></td>
  </tr>

<?php
	}
echo "</table><br>";
?>
<?php
$pager = "��{$num_cnt}����¼; ÿҳ{$page_size}����¼; ��{$page_cnt}ҳ<br>��ת���� "; //��ʾ�ֲ�
if($page_cnt > 1)
	{ //ҳ����������������ʾ�ֲ�
		for($i=1; $i <= $page_cnt; $i++)
		  {	if($page==$i){ $pager.="<B>$i</B> ";}else{ $pager.="<a href='class_list.php?cn=$ccc&p=$i'>$i</a> "; } }
		echo "<center>".$pager . " ҳ</center>";
	}?>
  </td>
  </tr>
 </table>
<?php
$rs=NULL;
?>
</table>

</body>
</html>
