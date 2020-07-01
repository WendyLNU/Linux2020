<center><embed src="images/dong.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="778" height="200"></a></embed></center>
<table width="778" border="0" cellspacing="0" cellpadding="2" align="center" height="33" background="images/002.jpg">
  <tr>
  <td align="center" onMouseOver="this.bgColor='#FFCC66'" onMouseOut="this.bgColor=''"><a href="default.php"><img src="images/home1.gif" />Ê×Ò³</a></td>
<?php
$sql = "Select bigclassname From bigclass where not sp";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
while($row = mysql_fetch_array($result))
{   
?>
    <td align="center" onMouseOver="this.bgColor='#FFCC66'" onMouseOut="this.bgColor=''" >		<a href="class_list.php?cn=<?php echo $row["bigclassname"]; ?>" target="_blank"><?php echo $row["bigclassname"]; ?></a>
	</td>
<?php
}
mysql_free_result($result);
?>
  </tr>
</table>

