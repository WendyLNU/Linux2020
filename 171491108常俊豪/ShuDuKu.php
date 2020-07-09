<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>增加</title>
</head>

<body>
<a href="ShuDu.php" target="_blank"><h1 align="center">OK</h1></a>
<?php
include("Conn.php");
$arr0 = array();
$arr1 = array();
$arr2 = array();
$arr3 = array();
$arr4 = array();
$arr5 = array();
$arr6 = array();
$arr7 = array();
$arr8 = array();
for($x = 0;$x<9;$x++){
	$z = $_POST["a"][$x];
	$arr0[$x] = $z;
}
for($x = 0;$x<9;$x++){
	$z = $_POST["b"][$x];
	$arr1[$x] = $z;
}
for($x = 0;$x<9;$x++){
	$z = $_POST["c"][$x];
	$arr2[$x] = $z;
}
for($x = 0;$x<9;$x++){
	$z = $_POST["d"][$x];
	$arr3[$x] = $z;
}
for($x = 0;$x<9;$x++){
	$z = $_POST["e"][$x];
	$arr4[$x] = $z;
}
for($x = 0;$x<9;$x++){
	$z = $_POST["f"][$x];
	$arr5[$x] = $z;
}
for($x = 0;$x<9;$x++){
	$z = $_POST["g"][$x];
	$arr6[$x] = $z;
}
for($x = 0;$x<9;$x++){
	$z = $_POST["h"][$x];
	$arr7[$x] = $z;
}
for($x = 0;$x<9;$x++){
	$z = $_POST["i"][$x];
	$arr8[$x] = $z;
}
$str0 = implode(",",$arr0);
$str1 = implode(",",$arr1);
$str2 = implode(",",$arr2);
$str3 = implode(",",$arr3);
$str4 = implode(",",$arr4);
$str5 = implode(",",$arr5);
$str6 = implode(",",$arr6);
$str7 = implode(",",$arr7);
$str8 = implode(",",$arr8);
$str = $str0.",".$str1.",".$str2.",".$str3.",".$str4.",".$str5.",".$str6.",".$str7.",".$str8;
$myquery = mysql_query("select * from shudu where suyi=(select max(suyi) from shudu)",$db);
$row = mysql_fetch_array($myquery);
$res = $row[0]+1; 
$red = date("Y-m-d H:i:s");
$sql="insert into shudu (suyi,shdu,riqi) values('$res','$str','$red')";
$result = mysql_query($sql);
?>
</body>
</html>
