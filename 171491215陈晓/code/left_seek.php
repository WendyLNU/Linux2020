
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr bgcolor="#3300FF">
    <td align="center" style="color:#FFFFFF"> 新闻查询 </td>
  </tr>
  <tr>
    <td align="center">
	<form action="seek_list.php" method="post" name="formseek" target="_blank" onSubmit="return CheckFormseek();">
	<input name="kkk" type="text" size="20" maxlength="20"><br>
	<input name="ppp" type="radio" value="bt" checked>标题
	<input name="ppp" type="radio" value="nr">内容<br>
	<input name="" type="submit" value="查询">
	</form>
	</td>
  </tr>
</table>
<script language="javascript">
function CheckFormseek()
{
	if(document.formseek.kkk.value.trim()=="")
	{	alert("请输入查询内容");
		document.formseek.kkk.focus();
		return false;
	}
	<?php  	

if(isset($_SESSION['seek_pos']) || isset($_SESSION['seek_key']))
{
    unset($_SESSION['seek_pos']);
	unset($_SESSION['seek_key']);
}

	?>
	return true;
}
</script>
