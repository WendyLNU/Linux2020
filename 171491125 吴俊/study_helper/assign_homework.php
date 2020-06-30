<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>作业</title>
</head>

<body>
<?php
include("connect.php");
$sql = "select cname,cid from course";
$result = mysql_query($sql);
$row=mysql_fetch_array($result);
$cname=$row["cname"]; 
$cid=$row["cid"];
?>
<form action="homework_save.php" method="post" name="formadd" onSubmit="return CheckForm()">
<h1 align="center">添加作业信息</h1>
<table width="475" border="1" cellspacing="0" cellpadding="2" align="center">
<tr bgcolor="#AD7892">
    <td >科目</td>
    <td><select name="cid" size="1">
	<?php 
	while($row = mysql_fetch_array($result)){  
	?>
    <option <?php if( $row["cname"]==$cname ) echo "selected"; ?> 
	value="<?php echo $row["cid"]; ?>"><?php echo $row["cname"]; ?></option>
	<?php
 	 }	
	?>
    </select></td>
  </tr>
  <tr bgcolor="#BC859D">
    <td width="71">题目</td>
    <td width="390">
	<input name="name" type="text" size="50" maxlength="50"></td>
  </tr>
  <tr height="400" bgcolor="#D0B3BA">
    <td width="71">内容</td>
    <td width="390"><textarea name="nr" cols="58" rows="20"></textarea></td>
  </tr>
   <tr bgcolor="#BC859D">
    <td width="71">截止日期</td>
    <td width="390">
	<input name="rq" type="text" size="50" maxlength="50"></td>
  </tr>
  <tr  bgcolor="#BC859D">
    <td colspan="2" align="center">
	<input name="tj" type="submit" value="提交"></td>
  </tr>
</table>
</form>
</body>
</html>
<script language="javascript">
function CheckForm()
{
if(document.formadd.name.value.trim()==""){
	alert("输入标题！");
	document.formadd.name.focus();
	return false;
	}
if(document.formadd.nr.value.trim()==""){
	alert("输入内容！");
	document.formadd.nr.focus();
	return false;
	}
if(document.formadd.rq.value.trim()==""){
	alert("输入截止日期！");
	document.formadd.rq.focus();
	return false;
	}
return true;
}
</script>