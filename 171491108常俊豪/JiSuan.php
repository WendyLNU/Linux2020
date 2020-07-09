<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>计算</title>
</head>

<body>
<form action="ShuRu.php" method="post" onSubmit="return ZhanShi();">
<table align="center"  width="500" border="0" cellspacing="0" cellpadding="2">
<tr align="center"><td><input name="first" type="text" id="f"></td></tr><br>
<tr align="center"><td><input name="second" type="text" id="s"></td></tr><br>
<tr align="center">
	<td><input name="add" type="button" value="+" onClick="Add()">&nbsp;&nbsp;
	<input name="del" type="button" value="-" onClick="Del()">&nbsp;&nbsp;
	<input name="cheng" type="button" value="x" onClick="Cheng()"></td>
</tr><br>
<tr align="center">
	<td><input name="chu" type="button" value="/" onClick="Chu()">&nbsp;&nbsp;
	<input name="mi" type="button" value="^" onClick="Mi()">&nbsp;&nbsp;
	<input name="yu" type="button" value="%" onClick="Yu()"></td>
</tr><br>
<tr align="center">
	<td><input name="qie" type="button" value="tan" onClick="Qie()">&nbsp;
	<input name="zheng" type="button" value="sin" onClick="Zheng()">&nbsp;
	<input name="xian" type="button" value="cos" onClick="Xian()"></td>
</tr><br>
<tr align="center"><td><input name="ti" type="submit" value="="></td></tr><br>
<tr align="center"><td><input name="fu" type="hidden" value="" id="fu"></td></tr><br>
<tr align="center"><td><input name="yin" type="hidden" value="" id="yin"></td></tr>
</table>
</form>
</body>
</html>

<script language="javascript">
function Add(){
	h = Number(document.getElementById("f").value)+Number(document.getElementById("s").value);
	document.getElementById("yin").value = h;
	document.getElementById("fu").value = "+";
}
function Del(){
	h = Number(document.getElementById("f").value)-Number(document.getElementById("s").value);
	document.getElementById("yin").value = h;
	document.getElementById("fu").value = "-";
}
function Cheng(){
	h = Number(document.getElementById("f").value)*Number(document.getElementById("s").value);
	document.getElementById("yin").value = h;
	document.getElementById("fu").value = "*";
}
function Chu(){
	h = Number(document.getElementById("f").value)/Number(document.getElementById("s").value);
	document.getElementById("yin").value = h;
	document.getElementById("fu").value = "/";
}
function Yu(){
	h = Number(document.getElementById("f").value)%Number(document.getElementById("s").value);
	document.getElementById("yin").value = h;
	document.getElementById("fu").value = "%";
}
function Mi(){
	h = 1;
	for(i=Number(document.getElementById("s").value);i>0;i--){
		h = h*Number(document.getElementById("f").value);
	}
	document.getElementById("yin").value = h;
	document.getElementById("fu").value = "^";
}
	function Qie(){
	h = Number(document.getElementById("f").value);
	h = 0.01745*h;
	h = Math.tan(h);
	document.getElementById("yin").value = h;
	document.getElementById("fu").value = "tan";
}
	function Zheng(){
	h = Number(document.getElementById("f").value);
	h = 0.01745*h;
	h = Math.sin(h);
	document.getElementById("yin").value = h;
	document.getElementById("fu").value = "sin";
}
	function Xian(){
	h = Number(document.getElementById("f").value);
	h = 0.01745*h;
	h = Math.cos(h);
	document.getElementById("yin").value = h;
	document.getElementById("fu").value = "cos";
}
	function ZhanShi(){
	h = document.getElementById("yin").value;
	alert(h);
	return true;
}
</script>