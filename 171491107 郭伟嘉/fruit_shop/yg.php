<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�����̵�Ա����¼ҳ��</title>
</head>

<body background="image/untitled.jpg" style="background-size:100% 100%">
<!-- �趨��һ��������Ա�˻�  ID��1  ���룺123456 -->

<div style="position:absolute;top:200px;left:700px;">
<?php 
header("Content-type:text/html;charset=gb2312");
include("time.php");
?>
<h1 align="center">�����̵�</h1>
<h4 align="center">��ӭ���������̵꣬���¼</h4>
<center>
<form action="yglogin.php" method="post" name="dl" target="_self" onSubmit="return myFun();">
�˺ţ�<input name="zh" type="text" size="15" maxlength="15"><br>
���룺<input name="mm" type="password" size="15" maxlength="15"><br><br>
<input name="dl" type="submit" value="��¼">
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
		    	alert("�������˺�");
				return false;}		
		else if(zhanghao.length!=0 && mima.length==0){
		    	alert("����������");
				return false;}	
		}	
</script>	
