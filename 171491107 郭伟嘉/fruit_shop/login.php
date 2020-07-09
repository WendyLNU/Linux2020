<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>果蔬商店</title>
</head>

<body>
<?php 
include("connect.php");
session_start();
$_SESSION["pass"] = $_POST["zh"];
$zh = $_POST["zh"];
$mm = $_POST["mm"];
$flag = 1;
$sql = "SELECT * FROM customer";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
while($row = mysql_fetch_array($result)){
	if($zh==$row["tel"]&&$mm==$row["mm"]){
	$flag = 0;
	echo "<script>{alert('欢迎您来购物！！！');location.href='HomePage.php'} </script>";
  }	
  }
  if($flag == 1){echo "<script>{alert('请输入正确的账号密码');history.back();} </script>";}
mysql_free_result($result);mysql_close($db);
?>
</table>
</body>
</html>
