<center><embed src="images/dong.swf" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="778" height="200"></center>
  <table width="778" border="0" cellspacing="0" cellpadding="2" align="center" height="33" background="images/002.jpg">
    <tr>
<?php
$sql = "Select bigclassname From bigclass where not sp";
$rs=new com("adodb.recordset");
$rs->open($sql,$db,1,1);//执行语句,返回记录集
while(! $rs->eof)
{
?>   
	  <td align="center" onMouseOver="this.bgColor='#33FF99'" onMouseOut="this.bgColor=''"><a href="class_list.php?cn=<?php echo $rs->Fields("bigclassname")->value; ?>" target="_blank"><?php echo $rs->Fields("bigclassname")->value; ?></a></td>
<?php
$rs->MoveNext(); 
}
$rs=NULL;
?>  
    </tr>
  </table>


