<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��������</title>
</head>

<body>
<?php 
include("connlj.php");
$nid=$_GET["xid"];
?>
<form action="pinglun_add_save.php" method="post" name="formadd" target="_self" onSubmit="return CheckForm();">
<h1 align="center">�����������Ϣ</h1>

<table width="778" border="1" cellspacing="0" cellpadding="0" align="center">
  <tr> </tr>
  <tr>
    <td bgcolor="#00CCFF" width="100">�������ź�</td>
    <td><input name="nid" type="text" size="60" maxlength="20" value="<?php echo $nid ?>"></td>
  </tr>
  <tr>
    <td bgcolor="#00CCFF">����</td>
    <td><input name="zz" type="text" size="60" maxlength="20"></td>
  </tr>
  <tr>
    <td bgcolor="#00CCFF">����ʱ��</td>
    <td><input name="sj" type="text" value="<?php echo date('Y-m-d')?>" size="60" maxlength="60" readonly="true" id="select_date" onFocus="ShowCalendar(this.id)"></td>
  </tr>
  <tr>
    <td bgcolor="#00CCFF">����</td>
    <td><textarea name="nr" cols="60" rows="7">&nbsp;</textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="qx" type="submit" value="�ύ����">
      &nbsp;&nbsp;
      <input name="qx" type="button" value="ȡ������"></td>
  </tr>
</table>
</form>

<script language="javascript">
function CheckForm()
{
	if(document.formadd.zz.value.trim()=="")
	{
	alert("���������ߣ�");
	document.formadd.zz.focus();
	return false;
	}
	if(document.formadd.nr.value.trim()=="")
	{
	alert("���������ݣ�");
	document.formadd.nr.focus();
	return false;
	}
return true;
}
</script>
</body>
</html>
