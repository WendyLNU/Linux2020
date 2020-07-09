<div class="row hidden-xs">
      <div style="height:30px"></div>
  </div>

<div class="row">
  <div class="col-md-12 col-xs-12">
      <div style="text-align: center;">
        <img src="images/1.png" class="img-responsive center-block" width="50px" align="absmiddle" style="display: inline;">
        <h1 style="display: inline;vertical-align: middle;">垃圾分类查询</h1>
        <div style="font-size: 8px;color: red;display: inline;"></div>
      </div>
  </div>
</div>
<br>



<table width="778" border="0" cellspacing="0" cellpadding="2" align="center">
  <tr>
    <td>
	<?php
	include("left_seek.php");
	?>
	
	</td>
  </tr>
  <tr>
    <td>
	<h1 align="left" style="color:#0066FF">新闻资讯</h1>
	<?php
$sql = "Select * From bigclass where homepage";
$rs=new com("adodb.recordset");
$rs->open($sql,$db,1,1);//执行语句,返回记录集
while(! $rs->eof)
{
$ccc=$rs->Fields("bigclassname")->value;
$nnn=$rs->Fields("rmax")->value;
$aaa=$rs->Fields("ad")->value;
ad($ccc,$nnn,$aaa);
$rs->MoveNext(); }
$rs=NULL;
?>
	
	
	</td>
  </tr>
</table>
