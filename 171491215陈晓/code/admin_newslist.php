<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���Ź���</title>
</head>
<body bgcolor="#FFFFCC">
<h1 align="center">�����б�</h1>
<center><a href="news_add.php">�������</a></center>
<table width="900" border="1" cellspacing="3" cellpadding="2" align="center">
  <tr bgcolor="#66CCFF">
    <td width="93">NID</td>
    <td width="447">title</td>
    <td width="118">infotime</td>
    <td width="74">hits</td>
    <td width="118">option</td>
  </tr>
<?php
include("conn.php");
$myquery = mysql_query("select count(*) from news ",$db);
$row = mysql_fetch_array($myquery);
$num_cnt = $row[0];		//��ȡ������
$page_size = 15; 		//ÿҳ��¼��15
$page_cnt = ceil($num_cnt / $page_size); //������ҳ��

//�޲���ִ��ʱ�����õ�һҳΪ��ǰҳ
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }

$query_start = ($page - 1) * $page_size; //����ÿҳ��ʼ�ļ�¼��
$querysql = "select * from news order by hits desc limit $query_start, $page_size "; //ʹ��MySQL���е�limit�Ӿ��ȡ��¼
$queryset = mysql_query($querysql); //ִ��SQL ���
while($row = mysql_fetch_array($queryset))
	{ //ѭ����ȡ�����
	echo "<tr bgcolor=\"#FFFFFF\"><td>" ."<a href=\"news_disp.php?xwh=".$row["NID"]."\" target=\"_blank\">". $row["NID"] . "</td>";
	echo "<td> ". mb_substr($row["title"],0,20,"gb2312") . "</td>";
	 echo "<td>".Date("Y��m��d��",StrToTime($row["infotime"]))."</td>";
	echo "<td>" . $row["hits"] . "</td>";
	?>
	<td width="84"><a href="news_modi.php?xwh=<?php echo $row["NID"]; ?> " target="_blank">�޸�</a>&nbsp;&nbsp;<a href="news_del.php?xwh=<?php echo $row["NID"]; ?>">ɾ��</a></td>
	</tr>
	<?php
	}
echo "</table><br>";
$pager = "��{$num_cnt}����¼; ÿҳ{$page_size}����¼; ��{$page_cnt}ҳ<br>��ת���� "; //��ʾ�ֲ�
if($page_cnt > 1)
	{ //ҳ����������������ʾ�ֲ�
		for($i=1; $i <= $page_cnt; $i++)
		  {	if($page==$i){ $pager.="<B>$i</B> ";}else{ $pager.="<a href='admin_newslist.php?p=$i'>$i</a> "; } }
		echo "<center>".$pager . " ҳ</center>";
	}
mysql_close($db);
?>
?>
</body>
</html>
