<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>ɾ��</title>
</head>
<body>
<?php
include("Conn.php");
$syhm = $_GET["syh"];
$sql="delete from shudu where suyi=$syhm";
$queryset = mysql_query($sql);
if($queryset)
	echo"<script>{alert('ɾ���ɹ�');document.location.href='LiShi.php'}</script>";
else
	echo"<script>{alert('ɾ��ʧ��');history.back();}</script>";
?>
</body>
</html>
