<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>ע���û�</title>
</head>

<body background="image/d4eb4481f925f5fdcf83c4b81ecdefbd19a59df839f93d-ZTM1Y1_fw658.jpg" style="background-size:100% 100%">
<?php 
include("connect.php");
?>
<div id="d1" style=" position:absolute;top:200px;left:650px;">
<form action="zhuce_save.php" method="post" name="zc" onSubmit="return CheckForm()">
<h1 align="center">�������Ϣ</h1>
<table width="300" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#FFFFCC">
    <td width="111">����</td>
    <td width="175"><input name="xm" type="text" size="20" maxlength="20"></td>
  </tr>
  <tr bgcolor="#CCFFCC">
    <td>�Ա�</td>
    <td><input name="xb" type="radio" value="��" checked>��&nbsp;&nbsp;<input name="xb" type="radio" value="Ů">Ů</td>
  </tr>
  <tr bgcolor="#99FFCC">
    <td>��ַ</td>
    <td><select name="dz" size="1" >
  <option value="��ƽ��">��ƽ��</option>
  <option value="�����">�����</option>
  <option value="�ʹ���">�ʹ���</option>
  <option value="����">����</option>
  <option value="������" selected="selected">������</option>
  <option value="������">������</option>
  <option value="�ں���">�ں���</option>
  <option value="������">������</option>
</select></td>
  </tr>
  <tr bgcolor="#66FFCC">
    <td >�绰</td>
    <td ><input name="tel" type="text" size="20" maxlength="20"></td>
  </tr>
  <tr bgcolor="#CCFFFF">
    <td >����</td>
    <td><input name="mm" type="text" size="20" maxlength="20"></td>
  </tr>
    <tr bgcolor="#99FFFF">
    <td>ȷ������</td>
    <td><input name="qr" type="text" size="20" maxlength="20"></td>
  </tr>
  <tr bgcolor="#99CCFF">
    <td colspan="2" align="center">
	<input name="tj" type="submit" value="�ύ">&nbsp;
	<input name="qx" type="button" value="ȡ��">
	</td>
  </tr>
  </table>
</form>
</div>
</body>
</html>
<script language="javascript">
function CheckForm()
{
if(document.zc.xm.value.trim()==""){
	alert("����������");
	document.zc.xm.focus();
	return false;
	}
if(document.zc.tel.value.trim()==""){
	alert("����绰��");
	document.zc.tel.focus();
	return false;
	}
if(document.zc.mm.value.trim()==""){
	alert("�������룡");
	document.zc.mm.focus();
	return false;
	}
if(document.zc.qr.value.trim()==""){
	alert("����ȷ�����룡");
	document.zc.qr.focus();
	return false;
	}
if(document.zc.mm.value.trim()!=document.zc.qr.value.trim()){
	alert("�����������벻һ�£�");
	return false;
	}
return true;
}
</script>