<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�����̵�</title>
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
	echo "<script>{alert('��ӭ�����������');location.href='HomePage.php'} </script>";
  }	
  }
  if($flag == 1){echo "<script>{alert('��������ȷ���˺�����');history.back();} </script>";}
mysql_free_result($result);mysql_close($db);
?>
</table>
</body>
</html>
