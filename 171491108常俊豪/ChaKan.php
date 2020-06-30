<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>查看</title>
</head>

<body>
<?php
include("Conn.php");
$syhm = $_GET["syh"];
$sql="select * from ShuDu where suyi=$syhm";
$queryset = mysql_query($sql); 
$row = mysql_fetch_array($queryset);
?>
<table width="778" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#666666">
    <td height="37" align="center"><?php echo $row["suyi"]; ?>号 数独<?php echo $row["suyi"]; ?></td>
  </tr>
  <tr bgcolor="#CCCCCC" align="center">
    <td height="137"><?php 
	$sd = $row["shdu"];
	$sz = explode(",",$sd,81);
	for($i = 0;$i<9;$i++){
		for($j=0;$j<9;$j++){
			echo $sz[$i+$j];
			echo " ";
			if($j==8)
				echo "<br />";
		}
	}
	?></td>
  </tr>
  <tr bgcolor="#FFFFFF" align="center">
    <td height="61"><?php echo $row["riqi"];?></td>
  </tr>
</table>
</body>
</html>
