<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>注册用户</title>
</head>

<body background="image/d4eb4481f925f5fdcf83c4b81ecdefbd19a59df839f93d-ZTM1Y1_fw658.jpg" style="background-size:100% 100%">
<?php 
include("connect.php");
?>
<div id="d1" style=" position:absolute;top:200px;left:650px;">
<form action="zhuce_save.php" method="post" name="zc" onSubmit="return CheckForm()">
<h1 align="center">请添加信息</h1>
<table width="300" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#FFFFCC">
    <td width="111">姓名</td>
    <td width="175"><input name="xm" type="text" size="20" maxlength="20"></td>
  </tr>
  <tr bgcolor="#CCFFCC">
    <td>性别</td>
    <td><input name="xb" type="radio" value="男" checked>男&nbsp;&nbsp;<input name="xb" type="radio" value="女">女</td>
  </tr>
  <tr bgcolor="#99FFCC">
    <td>地址</td>
    <td><select name="dz" size="1" >
  <option value="和平区">和平区</option>
  <option value="沈河区">沈河区</option>
  <option value="皇姑区">皇姑区</option>
  <option value="大东区">大东区</option>
  <option value="铁西区" selected="selected">铁西区</option>
  <option value="浑南区">浑南区</option>
  <option value="于洪区">于洪区</option>
  <option value="沈北新区">沈北新区</option>
</select></td>
  </tr>
  <tr bgcolor="#66FFCC">
    <td >电话</td>
    <td ><input name="tel" type="text" size="20" maxlength="20"></td>
  </tr>
  <tr bgcolor="#CCFFFF">
    <td >密码</td>
    <td><input name="mm" type="text" size="20" maxlength="20"></td>
  </tr>
    <tr bgcolor="#99FFFF">
    <td>确认密码</td>
    <td><input name="qr" type="text" size="20" maxlength="20"></td>
  </tr>
  <tr bgcolor="#99CCFF">
    <td colspan="2" align="center">
	<input name="tj" type="submit" value="提交">&nbsp;
	<input name="qx" type="button" value="取消">
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
	alert("输入姓名！");
	document.zc.xm.focus();
	return false;
	}
if(document.zc.tel.value.trim()==""){
	alert("输入电话！");
	document.zc.tel.focus();
	return false;
	}
if(document.zc.mm.value.trim()==""){
	alert("输入密码！");
	document.zc.mm.focus();
	return false;
	}
if(document.zc.qr.value.trim()==""){
	alert("输入确认密码！");
	document.zc.qr.focus();
	return false;
	}
if(document.zc.mm.value.trim()!=document.zc.qr.value.trim()){
	alert("两次密码输入不一致！");
	return false;
	}
return true;
}
</script>