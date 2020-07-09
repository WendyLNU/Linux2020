

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td width="643"></td>
    <td align="center" bgcolor="#6699CC" style="color:#CCFFFF" width="643">关键字查询</td>
	<td width="643"></td>
  </tr>
  <tr>
    <td align="center" colspan="3">
	<form action="seek_list.php" method="post" name="formseek" target="_blank" onsubmit="return myFun222();">
	<input name="kkk" placeholder="请输入关键字" type="text" size="20" maxlength="20"><br>
	<input name="" type="submit" value="查询">
	</form>
	</td>
  </tr>
</table>



<script language="javascript">
function myFun222()
{
xingming=document.formseek.kkk.value;
if(xingming.length==0){alert("请输入关键字");return false;}

}
</script>
