<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>数独</title>
</head>

<body>
<form action="ShuDuKu.php" method="post" id="ShuDu" target="_self"  onSubmit="return TiJiao();">
<h1 align="center">数独</h1>
<table width="500" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr>
    <td><input name="a[]" type="text" maxlength="1" size="3.5" align="middle" id="0-0"></td>
    <td><input name="a[]" type="text" maxlength="1" size="3.5" align="middle" id="0-1"></td>
    <td><input name="a[]" type="text" maxlength="1" size="3.5" align="middle" id="0-2"></td>
    <td><input name="a[]" type="text" maxlength="1" size="3.5" align="middle" id="0-3"></td>
    <td><input name="a[]" type="text" maxlength="1" size="3.5" align="middle" id="0-4"></td>
    <td><input name="a[]" type="text" maxlength="1" size="3.5" align="middle" id="0-5"></td>
    <td><input name="a[]" type="text" maxlength="1" size="3.5" align="middle" id="0-6"></td>
    <td><input name="a[]" type="text" maxlength="1" size="3.5" align="middle" id="0-7"></td>
    <td><input name="a[]" type="text" maxlength="1" size="3.5" align="middle" id="0-8"></td>
  </tr>
  <tr>
    <td><input name="b[]" type="text" maxlength="1" size="3.5" align="middle" id="1-0"></td>
    <td><input name="b[]" type="text" maxlength="1" size="3.5" align="middle" id="1-1"></td>
    <td><input name="b[]" type="text" maxlength="1" size="3.5" align="middle" id="1-2"></td>
    <td><input name="b[]" type="text" maxlength="1" size="3.5" align="middle" id="1-3"></td>
    <td><input name="b[]" type="text" maxlength="1" size="3.5" align="middle" id="1-4"></td>
    <td><input name="b[]" type="text" maxlength="1" size="3.5" align="middle" id="1-5"></td>
    <td><input name="b[]" type="text" maxlength="1" size="3.5" align="middle" id="1-6"></td>
    <td><input name="b[]" type="text" maxlength="1" size="3.5" align="middle" id="1-7"></td>
    <td><input name="b[]" type="text" maxlength="1" size="3.5" align="middle" id="1-8"></td>
  </tr>
  <tr>
    <td><input name="c[]" type="text" maxlength="1" size="3.5" align="middle" id="2-0"></td>
    <td><input name="c[]" type="text" maxlength="1" size="3.5" align="middle" id="2-1"></td>
    <td><input name="c[]" type="text" maxlength="1" size="3.5" align="middle" id="2-2"></td>
    <td><input name="c[]" type="text" maxlength="1" size="3.5" align="middle" id="2-3"></td>
    <td><input name="c[]" type="text" maxlength="1" size="3.5" align="middle" id="2-4"></td>
    <td><input name="c[]" type="text" maxlength="1" size="3.5" align="middle" id="2-5"></td>
    <td><input name="c[]" type="text" maxlength="1" size="3.5" align="middle" id="2-6"></td>
    <td><input name="c[]" type="text" maxlength="1" size="3.5" align="middle" id="2-7"></td>
    <td><input name="c[]" type="text" maxlength="1" size="3.5" align="middle" id="2-8"></td>
  </tr>
  <tr>
    <td><input name="d[]" type="text" maxlength="1" size="3.5" align="middle" id="3-0"></td>
    <td><input name="d[]" type="text" maxlength="1" size="3.5" align="middle" id="3-1"></td>
    <td><input name="d[]" type="text" maxlength="1" size="3.5" align="middle" id="3-2"></td>
    <td><input name="d[]" type="text" maxlength="1" size="3.5" align="middle" id="3-3"></td>
    <td><input name="d[]" type="text" maxlength="1" size="3.5" align="middle" id="3-4"></td>
    <td><input name="d[]" type="text" maxlength="1" size="3.5" align="middle" id="3-5"></td>
    <td><input name="d[]" type="text" maxlength="1" size="3.5" align="middle" id="3-6"></td>
    <td><input name="d[]" type="text" maxlength="1" size="3.5" align="middle" id="3-7"></td>
    <td><input name="d[]" type="text" maxlength="1" size="3.5" align="middle" id="3-8"></td>
  </tr>
  <tr>
    <td><input name="e[]" type="text" maxlength="1" size="3.5" align="middle" id="4-0"></td>
    <td><input name="e[]" type="text" maxlength="1" size="3.5" align="middle" id="4-1"></td>
    <td><input name="e[]" type="text" maxlength="1" size="3.5" align="middle" id="4-2"></td>
    <td><input name="e[]" type="text" maxlength="1" size="3.5" align="middle" id="4-3"></td>
    <td><input name="e[]" type="text" maxlength="1" size="3.5" align="middle" id="4-4"></td>
    <td><input name="e[]" type="text" maxlength="1" size="3.5" align="middle" id="4-5"></td>
    <td><input name="e[]" type="text" maxlength="1" size="3.5" align="middle" id="4-6"></td>
    <td><input name="e[]" type="text" maxlength="1" size="3.5" align="middle" id="4-7"></td>
    <td><input name="e[]" type="text" maxlength="1" size="3.5" align="middle" id="4-8"></td>
  </tr>
  <tr>
    <td><input name="f[]" type="text" maxlength="1" size="3.5" align="middle" id="5-0"></td>
    <td><input name="f[]" type="text" maxlength="1" size="3.5" align="middle" id="5-1"></td>
    <td><input name="f[]" type="text" maxlength="1" size="3.5" align="middle" id="5-2"></td>
    <td><input name="f[]" type="text" maxlength="1" size="3.5" align="middle" id="5-3"></td>
    <td><input name="f[]" type="text" maxlength="1" size="3.5" align="middle" id="5-4"></td>
    <td><input name="f[]" type="text" maxlength="1" size="3.5" align="middle" id="5-5"></td>
    <td><input name="f[]" type="text" maxlength="1" size="3.5" align="middle" id="5-6"></td>
    <td><input name="f[]" type="text" maxlength="1" size="3.5" align="middle" id="5-7"></td>
    <td><input name="f[]" type="text" maxlength="1" size="3.5" align="middle" id="5-8"></td>
  </tr>
  <tr>
    <td><input name="g[]" type="text" maxlength="1" size="3.5" align="middle" id="6-0"></td>
    <td><input name="g[]" type="text" maxlength="1" size="3.5" align="middle" id="6-1"></td>
    <td><input name="g[]" type="text" maxlength="1" size="3.5" align="middle" id="6-2"></td>
    <td><input name="g[]" type="text" maxlength="1" size="3.5" align="middle" id="6-3"></td>
    <td><input name="g[]" type="text" maxlength="1" size="3.5" align="middle" id="6-4"></td>
    <td><input name="g[]" type="text" maxlength="1" size="3.5" align="middle" id="6-5"></td>
    <td><input name="g[]" type="text" maxlength="1" size="3.5" align="middle" id="6-6"></td>
    <td><input name="g[]" type="text" maxlength="1" size="3.5" align="middle" id="6-7"></td>
    <td><input name="g[]" type="text" maxlength="1" size="3.5" align="middle" id="6-8"></td>
  </tr>
  <tr>
    <td><input name="h[]" type="text" maxlength="1" size="3.5" align="middle" id="7-0"></td>
    <td><input name="h[]" type="text" maxlength="1" size="3.5" align="middle" id="7-1"></td>
    <td><input name="h[]" type="text" maxlength="1" size="3.5" align="middle" id="7-2"></td>
    <td><input name="h[]" type="text" maxlength="1" size="3.5" align="middle" id="7-3"></td>
    <td><input name="h[]" type="text" maxlength="1" size="3.5" align="middle" id="7-4"></td>
    <td><input name="h[]" type="text" maxlength="1" size="3.5" align="middle" id="7-5"></td>
    <td><input name="h[]" type="text" maxlength="1" size="3.5" align="middle" id="7-6"></td>
    <td><input name="h[]" type="text" maxlength="1" size="3.5" align="middle" id="7-7"></td>
    <td><input name="h[]" type="text" maxlength="1" size="3.5" align="middle" id="7-8"></td>
  </tr>
  <tr>
    <td><input name="i[]" type="text" maxlength="1" size="3.5" align="middle" id="8-0"></td>
    <td><input name="i[]" type="text" maxlength="1" size="3.5" align="middle" id="8-1"></td>
    <td><input name="i[]" type="text" maxlength="1" size="3.5" align="middle" id="8-2"></td>
    <td><input name="i[]" type="text" maxlength="1" size="3.5" align="middle" id="8-3"></td>
    <td><input name="i[]" type="text" maxlength="1" size="3.5" align="middle" id="8-4"></td>
    <td><input name="i[]" type="text" maxlength="1" size="3.5" align="middle" id="8-5"></td>
    <td><input name="i[]" type="text" maxlength="1" size="3.5" align="middle" id="8-6"></td>
    <td><input name="i[]" type="text" maxlength="1" size="3.5" align="middle" id="8-7"></td>
    <td><input name="i[]" type="text" maxlength="1" size="3.5" align="middle" id="8-8"></td>
  </tr>
</table>
<table align="center">
  <tr>
  <td><input name="ks" type="button" value="开始" onClick="GouJian()"></td>
  <td></td>
  <td></td>
  <td><input name="tj" type="submit" value="提交"></td>
  </tr>
</table>
<center><a href="LiShi.php" target="_blank"><td>历史</td></a></center>
</form>
</body>
</html>

<script language="javascript">
/*function GouJian(){
	for(i = 0;i<9;i++){
		for(j = 0;j<9;j++){
			var v = [];
			v.push(i);
			v.push("-");
			v.push(j);
			str = v.join("");
			if((i+1+j)%9!=0)
			document.getElementById(str).value = (i+1+j)%9;
			else
			document.getElementById(str).value = 9;
		}
	}
}*/
function GouJian(){
	for(m = 0;m<9;m++){
		for(n = 0;n<9;n++){
		var v = [];
		v.push(m);
		v.push("-");
		v.push(n);
		str = v.join("");
		document.getElementById(str).value = "";
		}
	}
	var arr = new Array();
	for(t = 0;t<9;t++){
		arr[t] = new Array();
	}
	for(i = 0;i<9;i++){
		for(j = 0;j<9;j++){
			b = true;
			k = Math.floor(Math.random()*9)+1;
			y = 0;
			for(p = 0;p<9;p++){
				if(arr[i][p] == k) {y++;}
				}
			for(g = 0;g<9;g++){
				if(arr[g][j] == k) {y++;}
				}
			if(y == 0){
				arr[i][j] = k;
				b = !b;
				}
		}
	}
	for(c = 0;c<25;){
		m = Math.floor(Math.random()*9);
		n = Math.floor(Math.random()*9);
		if(arr[m][n] != null){
		var v = [];
		v.push(m);
		v.push("-");
		v.push(n);
		str = v.join("");
		document.getElementById(str).value = arr[m][n];
		document.getElementById(str).style="color:#0000FF";
		c++;
		}
	}
}

function TiJiao(){
	bj = true;
	for(i = 0;i<9;i++){
		for(j=0;j<9;j++){
			for(p=j+1;p<9;p++){
				var v = [];
				v.push(i);
				v.push("-");
				v.push(j);
				str1 = v.join("");
				var b = [];
				b.push(i);
				b.push("-");
				b.push(p);
				str2 = b.join("");
				if(document.getElementById(str1).value == document.getElementById(str2).value||document.getElementById(str1).value=="")
					{bj = false;}
			}
		}
	}
	for(j = 0;j<9;j++){
		for(i=0;i<9;i++){
			for(p=i+1;p<9;p++){
				var v = [];
				v.push(i);
				v.push("-");
				v.push(j);
				str1 = v.join("");
				var b = [];
				b.push(p);
				b.push("-");
				b.push(j);
				str2 = b.join("");
				if(document.getElementById(str1).value == document.getElementById(str2).value||document.getElementById(str1).value=="")
					{bj = false;}
			}
		}
	}
	if(bj == false)
	{alert("WRONG!!!");return false;}
	else
	{alert("WIN!!!");return true;}
}
</script>

