<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr bgcolor="#3300FF">
    <td align="center" style="color:#FFFFFF"><img = "images/admin.gif">����Ա��¼ </td>
  </tr>
  <tr>
    <td align="center">
	<form action="log_check.php" method="post" name="formlog" target="_blank" onSubmit="return CheckFormlog();">
	�û���<input name="adname" type="text" size="20" maxlength="20"><br>
	����&nbsp;&nbsp; <input name="admm" type="password" size="20" maxlength="20">
	<input name="" type="submit" value="��¼">
	</form>
	</td>
  </tr>
</table>
<script language="javascript">
function CheckFormlog()
{
	if(document.formlog.adname.value.trim()=="")
	{	alert("����������");
		document.formlog.adname.focus();
		return false;
	}
	if(document.formlog.adname.value.trim()=="")
	{	alert("����������");
		document.formlog.adname.focus();
		return false;
	}
	return true;
}
</script>
