<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�����̵����ҳ��</title>
</head>

<body>
<?php 
include("connect.php");
$zh = $_POST["zh"];
$mm = $_POST["mm"];
$sql = "SELECT * FROM stuff where ID=$zh";
$result = mysql_query($sql,$db);
$row = mysql_fetch_array($result);
if($mm==$row["mm"]){
	echo "<script>{alert('��ӭ�����ϰ࣡����');location.href='manager.php'} </script>";
  }	
  else  {echo "<script>{alert('��������ȷ���˺�����');history.back();} </script>";}
//mysql_free_result($result);mysql_close($db);
?>
</table>
</body>
</html>