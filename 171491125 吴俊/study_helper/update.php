<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�ظ�����</title>
</head>

<body>
<?php
include("connect.php");
$ID = $_GET["wid"];
$sql = "select * from content where wid=$ID";
$result = mysql_query($sql);
$row=mysql_fetch_array($result);
$scontent=$row["scontent"];
?>
<form action="update_save.php" method="post" name="formadd" onSubmit="return CheckForm()">
<h1 align="center">�ظ�����</h1>
<table width="600" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr>
    <td width="160" bgcolor="#FFFFCC">ѧ������</td>
    <td width="420">
	<?php echo $scontent; ?></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">�ظ�����</td>
    <td>
	<textarea name="nr" cols="70" rows="7"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
	<input name="wid" type="hidden" value="<?php echo $ID; ?>">
	<input name="tj" type="submit" value="�ύ"></td>
  </tr>
</table>
</form>
</body>
</html>
<script language="javascript">
function CheckForm()
{
if(document.formadd.nr.value.trim()==""){
	alert("��û��д�����ԣ�");
	document.formadd.nr.focus();
	return false;
	}
return true;
}
</script>
