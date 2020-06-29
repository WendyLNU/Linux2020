<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>果蔬商店员工登录页面</title>
</head>

<body background="image/untitled.jpg" style="background-size:100% 100%">
<!-- 设定了一个管理人员账户  ID：1  密码：123456 -->

<div style="position:absolute;top:200px;left:700px;">
<?php 
header("Content-type:text/html;charset=gb2312");
include("time.php");
?>
<h1 align="center">果蔬商店</h1>
<h4 align="center">欢迎来到果蔬商店，请登录</h4>
<center>
<form action="yglogin.php" method="post" name="dl" target="_self" onSubmit="return myFun();">
账号：<input name="zh" type="text" size="15" maxlength="15"><br>
密码：<input name="mm" type="password" size="15" maxlength="15"><br><br>
<input name="dl" type="submit" value="登录">
</form>
</center>
</div>
</body>
</html>
<script language="javascript">
	function myFun(){
		zhanghao=document.dl.zh.value;
		mima=document.dl.mm.value;
		if(zhanghao.length==0){
		    	alert("请输入账号");
				return false;}		
		else if(zhanghao.length!=0 && mima.length==0){
		    	alert("请输入密码");
				return false;}	
		}	
</script>	
