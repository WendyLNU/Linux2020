<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�޸���Ʒ��Ϣ</title>
</head>

<body background="image/18787709_145919198000_2.jpg" style="background-size:100% 100%">
<?php
include("connect.php");
$ID = $_GET["ID"];
$sql = "select * from fruit where ID=$ID";
$result = mysql_query($sql);
$row=mysql_fetch_array($result);
$name=$row["name"]; 
$price=$row["price"];
$lb=$row["lb"];
$yn=$row["yn"];
$num=$row["num"];
?>
<form action="fruit_change_save.php" method="post" name="formadd" onSubmit="return CheckForm()">
<h1 align="center"><font color="#660099">�޸���Ʒ��Ϣ</font></h1>
<table width="600" border="1" cellspacing="0" cellpadding="2" align="center" bgcolor="#666699">
  <tr>
    <td width="160" bgcolor="#FFFFCC">��Ʒ��</td>
    <td width="420">
	<input name="name" type="text" size="60" maxlength="60" value="<?php echo $name; ?>">	</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">�ۼۣ�Ԫ/���</td>
    <td>
	<input name="price" type="text" size="60" maxlength="20" value="<?php echo $price; ?>">	</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">���</td>
    <td>
	<input name="lb" type="text" size="60" maxlength="20" value="<?php echo $lb; ?>"></td>
	<td width="0"></td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">�Ƿ��ؼ�</td>
    <td>
	<input name="yn" type="text" size="60"  maxlength="20" value="<?php echo $yn; ?>">	</td>
  </tr>
  <tr>
    <td bgcolor="#FFFFCC">ʣ�����������</td>
    <td>
	<input name="num" type="text" size="60"  maxlength="20" value="<?php echo $num; ?>">	</td>
  </tr>
  <tr>
    <td colspan="2" align="center">
	<input name="ID" type="hidden" value="<?php echo $ID; ?>">
	<input name="tj" type="submit" value="�ύ">&nbsp;
	<input name="qx" type="button" value="ȡ��">	</td>
  </tr>
</table>
</form>
</body>
</html>
<script language="javascript">
function CheckForm()
{
if(document.formadd.name.value.trim()==""){
	alert("������Ʒ����");
	document.formadd.name.focus();
	return false;
	}
if(document.formadd.price.value.trim()==""){
	alert("�����ۼۣ�");
	document.formadd.price.focus();
	return false;
	}
if(document.formadd.lb.value.trim()==""){
	alert("�������");
	document.formadd.lb.focus();
	return false;
	}
if(document.formadd.yn.value.trim()==""){
	alert("�Ƿ��ؼۣ�");
	document.formadd.yn.focus();
	return false;
if(document.formadd.num.value.trim()==""){
	alert("����ʣ��������");
	document.formadd.num.focus();
	return false;
	}
return true;
}
</script>
