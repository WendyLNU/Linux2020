<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>输入</title>
</head>

<body>
<?php
include("Conn.php");
$f = $_POST["first"];
$s = $_POST["second"];
$o = $_POST["fu"];
$j = $_POST["yin"];
$myquery = mysql_query("select * from jisuan where suyi=(select max(suyi) from jisuan)",$db);
$row = mysql_fetch_array($myquery);
$res = $row[0]+1; 
$sql="insert into jisuan (suyi,fi,se,op,ed) values('$res','$f','$s','$o','$j')";
$result = mysql_query($sql);
?>
<a href="JiSuan.php" target="_blank"><h1 align="center">OK</h1></a>
</body>
</html>
