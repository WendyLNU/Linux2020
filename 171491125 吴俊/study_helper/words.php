<html>
<head>
<meta http-equiv="Content-Type" content="text/ html; charset=gb2312">
<title>����</title>
</head>

<body background="1.jpg" style="background-size:100% 100%">
<?php
session_start();
include("connect.php");
$_SESSION["cidcid"] = $_GET["cid"];
?>
<form action="words_save.php" method="post" name="formadd" onSubmit="return CheckForm()">
<h1 align="center">�����������Ϣ</h1>
<table width="600" border="1" cellspacing="0" cellpadding="2" style="position:absolute;top:130px;left:500px;">
  <tr height="470px">
    <td width="63" bgcolor="#FFCCCC">������</td>
    <td width="523"><textarea name="nr" cols="80" rows="20"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
	<input name="tj" type="submit" value="�ύ����"></td>
  </tr>
</table>
</form>
</body>
</html>
<script language="javascript">
function CheckForm()
{
if(document.formadd.nr.value.trim()==""){
	alert("�������ݣ�");
	document.formadd.nr.focus();
	return false;
	}
return true;
}
</script>