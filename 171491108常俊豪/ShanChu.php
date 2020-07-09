<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>删除</title>
</head>
<body>
<?php
include("Conn.php");
$syhm = $_GET["syh"];
$sql="delete from shudu where suyi=$syhm";
$queryset = mysql_query($sql);
if($queryset)
	echo"<script>{alert('删除成功');document.location.href='LiShi.php'}</script>";
else
	echo"<script>{alert('删除失败');history.back();}</script>";
?>
</body>
</html>
