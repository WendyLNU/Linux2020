
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���Ź���</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#FF99CC">
<?php 
include("conn.php");
include("cookie_check.php");
$name=$_COOKIE['adname'];
?>
<center><embed src=" images/dong.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="778" height="200"></embed></center>
<table width="778" border="0" cellspacing="0" cellpadding="2" align="center" height="33" bgcolor="#0066CC">
  <tr>
  <td width="177">  <?php include("left_timer.php");?></td>
  <td width="36" align="center" onMouseOver="this.bgColor='#FFCC66'" onMouseOut="this.bgColor=''"><a href="default.php"><img src="images/home1.gif" /><br>
    ��ҳ</a></td>
    <td width="227" align="center" onMouseOver="this.bgColor='#FFCC66'" onMouseOut="this.bgColor=''" ><a href="admin_newslist.php" target="_blank">���Ź���</a>	</td>
	    <td width="229" align="center" onMouseOver="this.bgColor='#FFCC66'" onMouseOut="this.bgColor=''" ><a href="pinglun_list.php" target="_blank">���۹���</a>	</td>
		<td width="89"><a href="log_out.php">ע����¼</a></td>
</table>
<table width="778" border="0" cellspacing="0" cellpadding="2" align="center" height="33" bgcolor="#FFFFFF">
  <tr>
  <td width="205"  bgcolor="#66CC99" valign="top">
  <img src="images/author.jpg" width="150" height="90"  >
  <h2> <?php echo "��ã�$name";?></h2>
  <h3> ��ӭ����¼</h3>
  <h4>�޸�����:</h4>  </td>
  <td width="573" align="center"  valign="top" bgcolor="#FFFFFF">
  <?php
   $sqln = "Select * from news";
$resultn = mysql_query($sqln,$db) OR die (mysql_error($db));
   $hitsall=0;
   $news=0;
   while($rown = mysql_fetch_array($resultn))
{
	$hitsall=$hitsall+$rown["hits"]; 
	$news++;
}
   $sqlp = "Select * from shop_pinglun";
$resultp = mysql_query($sqlp,$db) OR die (mysql_error($db));
   $pinglunno=0;
   $plnum=0;
   while($rowp = mysql_fetch_array($resultn))
{
 	if($rowp["pinglunok"]==0)
	{	$pinglunno++;}
	$plnum++;
}
?>
  �ۼ���������<?php echo $news ?><br>
  �ۼƵ������<?php echo $hitsall ?><br>
  �ۼ���������<?php echo $plnum; ?><br>
  ��������ۣ� <?php echo $pinglunno ;?>��<br>
    <?php include ("left_seek.php") ?>
	��ѯ��������޸�
	</td>
  <form action=" admin_change.php" method="post" name="formxgmm">
  <tr bgcolor="#66CCFF">
  <td >�û����� </td>
    <td><input name="xm" type="text" size="20" maxlength="20"> </td>
  </tr>
    <tr bgcolor="#66CCFF">
  <td >���û������ɲ���� </td>
    <td><input name="nxm" type="text" size="20" maxlength="20" value=""> </td>
	</tr>
    <tr bgcolor="#66CCFF">
  <td >�����룺    </td>
    <td><input name="omm" type="password" size="20" maxlength="20"> </td>
	</tr>
    <tr bgcolor="#66CCFF">
  <td >�����룺   </td>
    <td><input name="nmm" type="password" size="20" maxlength="20">  </td>
  </tr>
   <tr bgcolor="#66CCFF">
  <td ><input name="" type="submit" value="�޸�"></td>
  <td>  </td>
  </tr>
  </form>
</table>
</body>
</html>
