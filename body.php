<html>
<body background="image/下载.jpg">
<table width="800" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="100" align="center">操作</td>
    <td width="600" align="center">我的成绩</td>
  </tr>
  <tr>
    <td width="100" align="center">&nbsp;</td>
    <td width="600" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td width="100" valign="top">
	<?php  include("seek.php");
	include("op.php"); 
	 ?>
	</td>
    <td><?php echo include("list.php"); ?></td>
  </tr>
</table>
</body>
</html>
