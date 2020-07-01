<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr bgcolor="#3300FF">
    <td align="center" style="color:#FFFFFF"><img = "images/admin.gif">管理员登录 </td>
  </tr>
  <tr>
    <td align="center">
	<form action="log_check.php" method="post" name="formlog" target="_blank" onSubmit="return CheckFormlog();">
	用户名<input name="adname" type="text" size="20" maxlength="20"><br>
	密码&nbsp;&nbsp; <input name="admm" type="password" size="20" maxlength="20">
	<input name="" type="submit" value="登录">
	</form>
	</td>
  </tr>
</table>
<script language="javascript">
function CheckFormlog()
{
	if(document.formlog.adname.value.trim()=="")
	{	alert("请输入姓名");
		document.formlog.adname.focus();
		return false;
	}
	if(document.formlog.adname.value.trim()=="")
	{	alert("请输入密码");
		document.formlog.adname.focus();
		return false;
	}
	return true;
}
</script>
