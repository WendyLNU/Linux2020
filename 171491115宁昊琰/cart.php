<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>������Ϣ</title>
</head>

<body background="image/δ����-1.jpg" style="background-size:100% 100%">
<?php
include("connect.php");
$ID = $_GET["ID"];
$sql = "select * from fruit where ID=$ID";
$result = mysql_query($sql);
$row=mysql_fetch_array($result);
$name=$row["name"]; 
$price=$row["price"];
$lb=$row["lb"];
$yn=$row["yn"];
$num=$row["num"];
?>
<div id="d1" style=" position:absolute;top:150px;left:750px;">
<form action="shopping_cart_save.php" method="post" name="formadd" onSubmit="return CheckForm()">
<h1 align="center">������Ϣ</h1>
<table width="600" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr>
    <td width="160" bgcolor="#00FF99">��Ʒ��</td>
    <td width="420">
	<input name="name" type="text" size="60" maxlength="60" value="<?php echo $name; ?>" readonly>	</td>
  </tr>
  <tr>
    <td bgcolor="#00FF99">�ۼۣ�Ԫ/���</td>
    <td>
	<input name="price" type="text" size="60" maxlength="20" value="<?php echo $price; ?>" readonly>	</td>
  </tr>
  <tr>
    <td bgcolor="#00FF99">���</td>
    <td>
	<input name="lb" type="text" size="60" maxlength="20" value="<?php echo $lb; ?>" readonly></td>
	<td width="0"></td>
  </tr>
  <tr>
    <td bgcolor="#00FF99">�Ƿ��ؼ�</td>
    <td>
	<input name="yn" type="text" size="60"  maxlength="20" value="<?php echo $yn; ?>" readonly>	</td>
  </tr>
  <tr>
    <td bgcolor="#00FF99">ʣ�����������</td>
    <td>
	<input name="num" type="text" size="60"  maxlength="20" value="<?php echo $num; ?>" readonly>	</td>
  </tr>
    <tr>
    <td bgcolor="#00FF99">�������������</td>
    <td>
	<input name="shopping_num" type="text" size="60"  maxlength="20" >	</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#66CC99">
	<input name="ID" type="hidden" value="<?php echo $ID; ?>">
	<input name="tj" type="submit" value="�ύ">&nbsp;
	<input name="qx" type="button" value="ȡ��">	</td>
  </tr>
</table>
</form>
</body>
</html>
<script language="javascript">
function CheckForm()
{
if(document.formadd.shopping_num.value.trim()==""){
	alert("���빺��������");
	document.formadd.shoping_num.focus();
	return false;
	}
return true;
}
</script>
