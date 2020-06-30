<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>添加商品</title>
</head>

<body background="image/18787709_145919198000_2.jpg" style="background-size:100% 100%">
<?php
include("connect.php");
?>
<form action="fruit_add_save.php" method="post" name="formadd" onSubmit="return CheckForm()">
<h1 align="center">添加商品信息</h1>
<table width="600" border="1" cellspacing="0" cellpadding="2" align="center" bgcolor="#666699">
  <tr>
    <td width="160" bgcolor="#FFFFCC">商品名</td>
    <td width="420">
	<input name="name" type="text" size="60" maxlength="60">	</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">售价（元/公斤）</td>
    <td>
	<input name="price" type="text" size="60" maxlength="20">	</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">类别</td>
    <td>
	<input name="lb" type="text" size="60" maxlength="20"></td>
	<td width="0"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">是否特价</td>
    <td>
	<input name="yn" type="text" size="60"  maxlength="20">	</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">剩余数量（公斤）</td>
    <td>
	<input name="num" type="text" size="60"  maxlength="20">	</td>
  </tr>
  <tr>
    <td colspan="2" align="center">
	<input name="tj" type="submit" value="提交">&nbsp;
	<input name="qx" type="button" value="取消">	</td>
  </tr>
</table>
</form>
</body>
</html>
<script language="javascript">
function CheckForm()
{
if(document.formadd.name.value.trim()==""){
	alert("输入商品名！");
	document.formadd.name.focus();
	return false;
	}
if(document.formadd.price.value.trim()==""){
	alert("输入售价！");
	document.formadd.price.focus();
	return false;
	}
if(document.formadd.lb.value.trim()==""){
	alert("输入类别！");
	document.formadd.lb.focus();
	return false;
	}
if(document.formadd.yn.value.trim()==""){
	alert("是否特价！");
	document.formadd.yn.focus();
	return false;
if(document.formadd.num.value.trim()==""){
	alert("输入剩余数量！");
	document.formadd.num.focus();
	return false;
	}
return true;
}
</script>