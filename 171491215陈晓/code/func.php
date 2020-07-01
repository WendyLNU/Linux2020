<?php function ad($c,$n,$a){?>

<table width="100%" border="0" cellspacing="0" cellpadding="2">
  <tr bgcolor="#66CCFF">
    <td width="60%" ><img src="images/sub.gif"  align="absmiddle"/><?php echo $c;?></td>
    <td width="23%">&nbsp;</td>
    <td width="17%"><a href="class_list.php?cn=<?php echo $c; ?>" target="_blank">更多</a>...</td>
  </tr>
 <?php
 include("conn.php");
$sqlf = "Select * From news where BigClassName='$c' limit 0,$n";//此处的记录集改名
$result = mysql_query($sqlf,$db) OR die (mysql_error($db));
$js=0;
while(($rsf= mysql_fetch_array($result)) && $js<3)
{

?>
  <tr>
    <td style="border-bottom: #FF3333 dotted 1px"><a href="news_disp.php?xwh=<?php echo $rsf["NID"]; ?>" target="_blank"><?php echo $rsf["title"]; ?></a></td>
    <td style="border-bottom: #FF3333 dotted 1px"><?php echo Date("Y年m月d日",StrToTime($rsf["infotime"])); ?></td>
    <td style="border-bottom: #FF3333 dotted 1px"><?php echo $rsf["hits"]; ?></td>
  </tr>
  
 <?php 
$js++;
}
$rsf=NULL;
?>
</table>

  <embed src="images/<?php echo $a;?>" quality="high"  width="578" height="80"></embed>
<?php } ?>

