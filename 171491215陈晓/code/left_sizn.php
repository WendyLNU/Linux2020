<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr bgcolor="#3300FF">
    <td align="center" style="color:#FF0000">课程思政 </td>
  </tr>
</table>
<marquee direction="up" height="100" scrollamount="2" scrolldelay="1" onMouseOut="this.start(); " onMouseOver="this.stop();"> 
<table width="200" border="0" cellspacing="0" cellpadding="0">
<?php
$sql = "select bigclassname ,count(*) as bc from news where bigclassname in (Select bigclassname From bigclass where sp) group by bigclassname";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
while($rs = mysql_fetch_array($result))
{
?>
  <tr >
    <td  ><a href="class_list.php?cn=<?php echo $rs["bigclassname"] ?>" target="_blank"><?php echo $rs["bigclassname"]; ?></a></td><td ><?php echo $rs["bc"]; ?> 条新闻</td>
  </tr>
 <?php
}
$rs=NULL;
?>
</table>
</marquee>
