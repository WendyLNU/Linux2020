
<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr bgcolor="#3300FF">
    <td align="center" style="color:#FFFFFF"> ���Ų�ѯ </td>
  </tr>
  <tr>
    <td align="center">
	<form action="seek_list.php" method="post" name="formseek" target="_blank" onSubmit="return CheckFormseek();">
	<input name="kkk" type="text" size="20" maxlength="20"><br>
	<input name="ppp" type="radio" value="bt" checked>����
	<input name="ppp" type="radio" value="nr">����<br>
	<input name="" type="submit" value="��ѯ">
	</form>
	</td>
  </tr>
</table>
<script language="javascript">
function CheckFormseek()
{
	if(document.formseek.kkk.value.trim()=="")
	{	alert("�������ѯ����");
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
