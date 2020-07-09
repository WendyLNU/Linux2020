<table width="778" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
  <td width="200" background="images/classbg.gif" valign="top">
  <?php 
  global $sucessyes;
  global $sucessname;
  include("left_timer.php");
  include("left_log.php");  
  include("left_seek.php");
  include("left_sizn.php");
  include("left_down.php");
  ?>
  </td>
  <td width="578" bgcolor="#FFFFFF" valign="top">
<?php
$sql = "Select * From bigclass where homepage";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
while( $rs = mysql_fetch_array($result))
{
$ccc= $rs["BigClassName"];
$nnn= $rs["Rmax"];
$aaa= $rs["AD"];
ad($ccc,$nnn,$aaa);
}
$rs=NULL;
?>
  </td>
  </tr>
  </table>
