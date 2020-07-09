<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>新闻管理</title>
</head>
<body bgcolor="#FFFFCC">
<h1 align="center">新闻列表</h1>
<center><a href="news_add.php">添加新闻</a></center>
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
$num_cnt = $row[0];		//获取总数量
$page_size = 15; 		//每页记录数15
$page_cnt = ceil($num_cnt / $page_size); //计算总页数

//无参数执行时，设置第一页为当前页
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }

$query_start = ($page - 1) * $page_size; //计算每页开始的记录号
$querysql = "select * from news order by hits desc limit $query_start, $page_size "; //使用MySQL独有的limit子句获取记录
$queryset = mysql_query($querysql); //执行SQL 语句
while($row = mysql_fetch_array($queryset))
	{ //循环获取结果集
	echo "<tr bgcolor=\"#FFFFFF\"><td>" ."<a href=\"news_disp.php?xwh=".$row["NID"]."\" target=\"_blank\">". $row["NID"] . "</td>";
	echo "<td> ". mb_substr($row["title"],0,20,"gb2312") . "</td>";
	 echo "<td>".Date("Y年m月d日",StrToTime($row["infotime"]))."</td>";
	echo "<td>" . $row["hits"] . "</td>";
	?>
	<td width="84"><a href="news_modi.php?xwh=<?php echo $row["NID"]; ?> " target="_blank">修改</a>&nbsp;&nbsp;<a href="news_del.php?xwh=<?php echo $row["NID"]; ?>">删除</a></td>
	</tr>
	<?php
	}
echo "</table><br>";
$pager = "共{$num_cnt}条记录; 每页{$page_size}条记录; 共{$page_cnt}页<br>跳转至第 "; //显示分布
if($page_cnt > 1)
	{ //页面总数大于是则显示分布
		for($i=1; $i <= $page_cnt; $i++)
		  {	if($page==$i){ $pager.="<B>$i</B> ";}else{ $pager.="<a href='admin_newslist.php?p=$i'>$i</a> "; } }
		echo "<center>".$pager . " 页</center>";
	}
mysql_close($db);
?>
?>
</body>
</html>
