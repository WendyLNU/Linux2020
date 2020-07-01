<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>修改新闻</title>
</head>
<body>
<?php
include("select_date.php");
include("conn.php");
include("cookie_check.php");
$xwh=$_GET["xwh"];
$sqlmodi="select * from news where nid=$xwh";
$rsmodire=mysql_query($sqlmodi,$db) OR die (mysql_error($db));
$rsmodi=mysql_fetch_array($rsmodire);//get 1 col
$btbt=$rsmodi["title"]; 
$zzzz=$rsmodi["user"];
$lblb=$rsmodi["bigclassname"];
$sjsj=$rsmodi["infotime"];
$nrnr=$rsmodi["content"];
$sql = "Select BigClassName From BigClass";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
?>
<form action="news_modi_save.php" method="post" name="formadd" onSubmit="return CheckFormdd();">
<h1>请输入相关信息</h1>
<table width="600" border="1" cellspacing="3" cellpadding="2">
  <tr>
    <td width="76" bgcolor="#66CCFF">标题</td>
    <td width="501"><input name="bt" type="text" value="<?php echo $btbt;?>" size="60" maxlength="60"></td>
  </tr>
  <tr>
    <td bgcolor="#66CCFF">作者</td>
    <td><input name="zz" type="text" value="<?php echo $zzzz;?>"  size="60" maxlength="20"></td>
  </tr>
  <tr>
    <td bgcolor="#66CCFF">类别</td>
    <td><select name="lb" size="1">
	<?php while( $rs= mysql_fetch_array($result)){ ?>
      <option <?php if( $rs["BigClassName"]==$lblb ) echo "selected";?> value="<?php echo $rs["BigClassName"]->value; ?>"><?php echo $rs["BigClassName"]; ?></option>
<?php
}
$rs=NULL;
?>
	</select>
	</td>
  </tr>
  <tr>
    <td bgcolor="#66CCFF">时间</td>
    <td><input name="sj" type="text"  value="<?php echo $sjsj;?>"  size="60" maxlength="60" readonly id="select_date" onFocus="javascript:ShowCalendar(this.id)"></td>
  </tr>
  <tr>
    <td bgcolor="#66CCFF">内容</td>
    <td><textarea name="nr" cols="60"  rows="7"><?php echo $nrnr;?></textarea></td>
  </tr>
  <tr>
    <td colspan="2" align="center">
	<input name="xwh" type="hidden" value="<?php echo $xwh;?>">
	<input name="pg" type="hidden" value="<?php echo $pg;?>">
	<input name="tj" type="submit" value="提交信息">&nbsp;<a href="admin_newslist.php"><input name="qx" type="button" value="取消"></a></td>
  </tr>
</table>
</form>
</body>
</html>
<script language="javascript">
function CheckFormdd()
{
	if(document.formadd.bt.value.trim()=="")
	{	alert("输入标题");
		document.formadd.bt.focus();
		return false;
	}
	if(document.formadd.zz.value.trim()=="")
	{	alert("输入作者");
		document.formadd.zz.focus();
		return false;
	}
	if(document.formadd.nr.value.trim()=="")
	{	alert("输入内容");
		document.formadd.nr.focus();
		return false;
	}
	return true;
}
</script>
