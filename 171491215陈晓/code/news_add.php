<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�������</title>
</head>
<body>
<?php
include("select_date.php");
include("conn.php");
include("cookie_check.php");
$sql = "Select BigClassName From BigClass";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
$rs= mysql_fetch_array($result);//ִ�����,���ؼ�¼��
?>
<form action="news_add_save.php" method="post" name="formadd" onSubmit="return CheckFormdd();">
<h1>�����������Ϣ</h1>
<table width="600" border="1" cellspacing="3" cellpadding="2">
  <tr>
    <td width="76" bgcolor="#66CCFF">����</td>
    <td width="501"><input name="bt" type="text" size="60" maxlength="60"></td>
  </tr>
  <tr>
    <td bgcolor="#66CCFF">����</td>
    <td><input name="zz" type="text" size="60" maxlength="20"></td>
  </tr>
  <tr>
    <td bgcolor="#66CCFF">���</td>
    <td><select name="lb" size="1">
	<?php while($rs){ ?>
      <option value="<?php echo $rs["BigClassName"]; ?>"><?php echo $rs["BigClassName"]; ?></option>
<?php
}
$rs=NULL;
?>
	</select>
	</td>
  </tr>
  <tr>
    <td bgcolor="#66CCFF">ʱ��</td>
    <td><input name="sj" type="text" value="<?php echo date('Y-m-d')?>" size="60" maxlength="60" readonly id="select_date" onFocus="javascript:ShowCalendar(this.id)"></td>
  </tr>
  <tr>
    <td bgcolor="#66CCFF">����</td>
    <td><textarea name="nr" cols="60" rows="7"></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><input name="tj" type="submit" value="�ύ��Ϣ">&nbsp;<a href="admin_newslist.php"><input name="qx" type="button" value="ȡ��"></a></td>
  </tr>
</table>
</form>
</body>
</html>
<script language="javascript">
function CheckFormdd()
{
	if(document.formadd.bt.value.trim()=="")
	{	alert("�������");
		document.formadd.bt.focus();
		return false;
	}
	if(document.formadd.zz.value.trim()=="")
	{	alert("��������");
		document.formadd.zz.focus();
		return false;
	}
	if(document.formadd.nr.value.trim()=="")
	{	alert("��������");
		document.formadd.nr.focus();
		return false;
	}
	return true;
}
</script>