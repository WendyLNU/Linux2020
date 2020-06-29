<?php function ad($c,$n,$a) { ?>
<table width=778 border="0" cellspacing="0" cellpadding="2">
  <tr bgcolor="#33FFFF">
    <td width="50%"><img src="images/sub.gif" align="absmiddle"><?php echo $c; ?></td>
    <td width="20%">&nbsp;</td>
    <td width="10%"><a href="class_list.php?cn=<?php echo $c; ?>" target="_blank">more...</a></td>
  </tr>
 
<?php
include("connlj.php");
$sqlf = "Select top $n * From news where bigclassname='$c' order by hits desc";
$rsf=new com("adodb.recordset");
$rsf->open($sqlf,$db,1,1);//执行语句,返回记录集
$js=0;
while(! $rsf->eof && $js<5)
{
?> 
  <tr>
    <td style="border-bottom:#FF0000 dotted 1px"><a href="news_disp.php?xwh=<?php echo $rsf->Fields("nid")->value; ?>" target="_blank"><?php echo $rsf->Fields("title")->value; ?></a></td>
    <td style="border-bottom:#FF0000 dotted 1px"><?php echo $rsf->Fields("infotime")->value; ?></td>
    <td style="border-bottom:#FF0000 dotted 1px"><?php echo $rsf->Fields("hits")->value; ?></td>
  </tr>
<?php
$rsf->MoveNext();
$js++; 
}
$rsf=NULL;
?> 
</table>


<embed src="images/<?php echo $a; ?>" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" width="778" height="80">
  <?php }?>
</embed>
