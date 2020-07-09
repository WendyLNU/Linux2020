<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>云商店</title>
</head>

<body background="image/330787-1FH2115I899.jpg" style="background-size:100% 100%">

<div id="d1" style=" position:absolute;top:200px;left:650px;">
<?php 
header("Content-type:text/html;charset=gb2312");
include("time.php");
?>
<h1 align="center" ><font color="#660000" face="Courier New, Courier, monospace">云超市</font></h1>
<h4 align="center">欢迎来到云商店，请登录</h4>
<center>
<form action="login.php" method="post" name="dl" target="_self" onSubmit="return myFun();">
账号：<input name="zh" type="text" size="15" maxlength="15"><br>
密码：<input name="mm" type="password" size="15" maxlength="15"><br><br>
<input name="dl" type="submit" value="登录">
</form>
<h7><a href="zhuce.php" title="注册账户" target="_self">未注册账号请先点击此处进行注册</a></h7><br><br><br>
<h7><a href="yg.php" title="员工登录" target="_self">员工登录请点击此处</a></h7>
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
