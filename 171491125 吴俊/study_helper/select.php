<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�ޱ����ĵ�</title>
</head>

<body>
<form  name="f1" action=" " method="post" >
<center>�����������ԵĿγ̺ţ����ɲ鿴�� <input name="w1" type="text" /> <input name="submit" type="submit" value="�ύ" /></center>
</form >
<?php

if(isset($_POST["w1"])){
	$_SESSION["cid"]=$_POST["w1"];
	}
	else
	echo "";
?>
<br />
</body>
</html>
