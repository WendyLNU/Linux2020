<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>新闻分类</title>
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
    <td>标题</td>
    <td>作者</td>
    <td>时间</td>
    <td>hits</td>
  </tr>
  <?php
  $myquery = mysql_query("Select * From news where bigclassname='$ccc'",$db);
  $row = mysql_fetch_array($myquery);
$num_cnt = $row[0];		//获取总数量
$page_size = 15; 		//每页记录数15
$page_cnt = ceil($num_cnt / $page_size); //计算总页数
//无参数执行时，设置第一页为当前页
if(isset($_GET['p'])){ $page = $_GET['p']; } else { $page = 1; }

$query_start = ($page - 1) * $page_size; //计算每页开始的记录号
$querysql = "Select * From news where bigclassname='$ccc' limit $query_start, $page_size"; //使用MySQL独有的limit子句获取记录
$queryset = mysql_query($querysql); //执行SQL 语句
while($row = mysql_fetch_array($queryset))
	{ //循环获取结果集
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
$pager = "共{$num_cnt}条记录; 每页{$page_size}条记录; 共{$page_cnt}页<br>跳转至第 "; //显示分布
if($page_cnt > 1)
	{ //页面总数大于是则显示分布
		for($i=1; $i <= $page_cnt; $i++)
		  {	if($page==$i){ $pager.="<B>$i</B> ";}else{ $pager.="<a href='class_list.php?cn=$ccc&p=$i'>$i</a> "; } }
		echo "<center>".$pager . " 页</center>";
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
