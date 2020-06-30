<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>学习小助手</title>
</head>

<body bgcolor="#000">
<style>
#header {
    background-color:black;
    color:white;
    text-align:center;
    padding:5px;
}
#footer {
    background-color:black;
    color:white;
    clear:both;
    text-align:center;
   padding:5px;	 	 
}
#section{
     
	height:480px;
	background-image:url(73f5f41259c5dcc1f066ba3b9613ef93.jpg);
	display:flex; 
	align-items:center;
	justify-content:center;
	
}
</style>

<div id="header">
<h1>学习小助手</h1>
</div>



<div id="section"><center>
<form action="login.php" name="f1" method="post" target="_self" onSubmit="return myFun();">
 <font size="3" >账号</font>
 <input name="id" type="text"/>
 <br/>
 <br/>
 <font size="3">密码</font>
 <input name="pd" type="text"/>
 <br/>
 <br/>
 <input type="submit" name="Submit" value="登录" />
</form>
</center>
</div>



<div id="footer">
书山有路勤为径，学海无涯苦作舟
<br/>
@copyright by wj
</div>
</body>
</html>
<script language="javascript">
	function myFun(){
		idq=document.f1.id.value;
		pdd=document.f1.pd.value;
		if(idq.length==0){
			if(pdd.length==0){
				alert("请输入密码和账号");
				return false;
				}
			else{
				alert("请输入账号");
				return false;
				}
		}
		else{
			if(pdd.length==0){
		    	alert("请输入密码");
				return false;
			}	
		}
	}
		
</script>
