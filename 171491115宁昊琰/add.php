<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�����Ʒ</title>
</head>

<body background="image/18787709_145919198000_2.jpg" style="background-size:100% 100%">
<?php
include("connect.php");
?>
<form action="fruit_add_save.php" method="post" name="formadd" onSubmit="return CheckForm()">
<h1 align="center">�����Ʒ��Ϣ</h1>
<table width="600" border="1" cellspacing="0" cellpadding="2" align="center" bgcolor="#666699">
  <tr>
    <td width="160" bgcolor="#FFFFCC">��Ʒ��</td>
    <td width="420">
	<input name="name" type="text" size="60" maxlength="60">	</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">�ۼۣ�Ԫ/���</td>
    <td>
	<input name="price" type="text" size="60" maxlength="20">	</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">���</td>
    <td>
	<input name="lb" type="text" size="60" maxlength="20"></td>
	<td width="0"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">�Ƿ��ؼ�</td>
    <td>
	<input name="yn" type="text" size="60"  maxlength="20">	</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">ʣ�����������</td>
    <td>
	<input name="num" type="text" size="60"  maxlength="20">	</td>
  </tr>
  <tr>
    <td colspan="2" align="center">
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
if(document.formadd.name.value.trim()==""){
	alert("������Ʒ����");
	document.formadd.name.focus();
	return false;
	}
if(document.formadd.price.value.trim()==""){
	alert("�����ۼۣ�");
	document.formadd.price.focus();
	return false;
	}
if(document.formadd.lb.value.trim()==""){
	alert("�������");
	document.formadd.lb.focus();
	return false;
	}
if(document.formadd.yn.value.trim()==""){
	alert("�Ƿ��ؼۣ�");
	document.formadd.yn.focus();
	return false;
if(document.formadd.num.value.trim()==""){
	alert("����ʣ��������");
	document.formadd.num.focus();
	return false;
	}
return true;
}
</script>