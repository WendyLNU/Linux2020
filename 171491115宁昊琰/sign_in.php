<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���̵�</title>
</head>

<body background="image/330787-1FH2115I899.jpg" style="background-size:100% 100%">

<div id="d1" style=" position:absolute;top:200px;left:650px;">
<?php 
header("Content-type:text/html;charset=gb2312");
include("time.php");
?>
<h1 align="center" ><font color="#660000" face="Courier New, Courier, monospace">�Ƴ���</font></h1>
<h4 align="center">��ӭ�������̵꣬���¼</h4>
<center>
<form action="login.php" method="post" name="dl" target="_self" onSubmit="return myFun();">
�˺ţ�<input name="zh" type="text" size="15" maxlength="15"><br>
���룺<input name="mm" type="password" size="15" maxlength="15"><br><br>
<input name="dl" type="submit" value="��¼">
</form>
<h7><a href="zhuce.php" title="ע���˻�" target="_self">δע���˺����ȵ���˴�����ע��</a></h7><br><br><br>
<h7><a href="yg.php" title="Ա����¼" target="_self">Ա����¼�����˴�</a></h7>
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
