<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>垃圾分类网站</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body bgcolor="#99CC66" topmargin="0" leftmargin="100">
<?php

include("connlj.php");
$key=$_POST["kkk"];

?>

<table width="778" border="1" cellspacing="0" cellpadding="2" align="center">
  <tr bgcolor="#00CC99">
    <th colspan="5"><?php echo  "查找关键词{$key}结果"?> </th>
  </tr>
  <tr bgcolor="#00CC99">
  <td><?php echo  "名称"?> </td>
  <td><?php echo  "类别"?> </td>
  </tr>
<?php
$sqlg = "Select * From fl where zhuti like '%{$key}%'";
$rsg=new com("adodb.recordset");
$rsg->open($sqlg,$db,1,1);//执行语句,返回记录集


if($rsg->RecordCount==0) {?> <td bgcolor="#00CC99" colspan="2"><?php echo "查找不到此条记录";}?></td>
<?php
while(! $rsg->eof)
{
?>
 <tr bgcolor="#00CC99" height="35">
    <td><?php echo $rsg->Fields("zhuti")->value; ?></td>
	<td><?php echo $rsg->Fields("leibie")->value; ?></td>
 </tr>
<?php
$rsg->MoveNext(); 
}
$rsg=NULL;
?>
</table>












 <div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12">
				  <h3 style="text-align: left;">干垃圾是指</h3>
				</div>
				<div class="col-md-12 col-xs-12">即其他垃圾，是指除可回收物、有害垃圾、湿垃圾以外的其它生活废弃物</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">干垃圾主要包括</h3></div>
				<div class="col-md-12 col-xs-12">餐盒、餐巾纸、湿纸巾、卫生间用纸、塑料袋、食品包装袋、污染严重的纸、烟蒂、纸尿裤、一次性杯子、大骨头、贝壳、花盆、陶瓷等</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">干垃圾投放要求</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<ul>
						<li>尽量沥干水分</li><li>难以辨识类别的生活垃圾投入干垃圾容器内</li>
					</ul>
				</div>
			</div>
		</div>
</div>


<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<hr style="border-color: #d0d0d0">
		</div>
</div>
 	

 	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">可回收物是指</h3></div>
				<div class="col-md-12 col-xs-12">废纸张、废塑料、废玻璃制品、废金属、废织物等适宜回收、可循环利用的生活废弃物</div>
			</div>
		</div>
	</div>


<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">可回收垃圾主要包括</h3></div>
				<div class="col-md-12 col-xs-12">酱油瓶、玻璃瓶、平板玻璃、易拉罐、饮料瓶、洗发水瓶、塑料玩具、书本、报纸、广告单、纸板箱、衣服、床上用品等</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">可回收物投放要求</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<ul>
						<li>轻投轻放</li><li>清洁干燥，避免污染，费纸尽量平整</li><li>立体包装物请清空内容物，清洁后压扁投放</li><li>有尖锐边角的、应包裹后投放</li>
					</ul>
				</div>
			</div>
		</div>
</div>


<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<hr style="border-color: #d0d0d0">
		</div>
</div>
 	

 	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">有害垃圾是指</h3></div>
				<div class="col-md-12 col-xs-12">废电池、废灯管、废药品、废油漆及其容器等对人体健康或者自然环境造成直接或者潜在危害的生活废弃物</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">有害垃圾主要包括</h3></div>
				<div class="col-md-12 col-xs-12">废电池、油漆桶、荧光灯管、废药品及其包装物等</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">有害垃圾投放要求</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<ul>
						<li>投放时请注意轻放</li><li>易破损的请连带包装或包裹后轻放</li><li>如易挥发，请密封后投放</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	


<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<hr style="border-color: #d0d0d0">
		</div>
</div>
 	

 	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">湿垃圾是指</h3></div>
				<div class="col-md-12 col-xs-12">日常生活垃圾产生的容易腐烂的生物质废弃物</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">湿垃圾主要包括</h3></div>
				<div class="col-md-12 col-xs-12">剩菜剩饭、瓜皮果核、花芬绿植、过期食品等</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-offset-1 col-md-10 col-xs-12">
			<div class="row">
				<div class="col-md-12 col-xs-12"><h3 style="text-align: left;">湿垃圾投放要求</h3></div>
			</div>
			<div class="row">
				<div class="col-md-12 col-xs-12">
					<ul>
						<li>纯流质的食物垃圾、如牛奶等，应直接倒进下水口</li><li>有包装物的湿垃圾应将包装物去除后分类投放、包装物请投放到对应的可回收物或干垃圾容器</li>
					</ul>
				</div>
			</div>
		</div>
	</div>



      <div class="row">

        <div class="col-md-6 col-xs-12"> 
          <div class="row" style="border: 1px dashed #dfdfdf;"> 
            <div class="col-md-3 col-xs-3" align="center"> 
              <img style="max-width: 600px;" alt="可回收物" src="images/5.png"> 
            </div> 
            <div class="col-md-9 col-xs-9" style="color: #3F6BA8;padding-left: 22px;vertical-align: middle;" align="center"> 
                <h3 style="margin-top: 0px">可回收物</h3> 
                <p style="">指废纸张、废塑料、废玻璃制品、废金属、废织物等适宜回收、可循环利用的生活废弃物。</p> 
            </div> 
          </div> 
        </div> 

        <div class="col-md-6 col-xs-12"> 
          <div class="row" style="border: 1px dashed #dfdfdf;"> 
            <div class="col-md-3 col-xs-3" align="center"> 
              <img style="max-width: 600px;" alt="有害垃圾" src="images/4.jpg"> 
            </div> 
            <div class="col-md-9 col-xs-9" style="color: #B43953;padding-left: 22px;vertical-align: middle;" align="center"> 
               <h3 style="margin-top: 0px">有害垃圾</h3> 
                <p style="">指废电池、废灯管、废药品、废油漆及其容器等对人体健康或者自然环境造成直接或者潜在危害的生活废弃物。</p> 
            </div> 
          </div> 
        </div> 
      </div>
      <div class="row">

        <div class="col-md-6 col-xs-12"> 
          <div class="row" style="border: 1px dashed #dfdfdf;"> 
            <div class="col-md-3 col-xs-3" align="center"> 
              <img style="max-width: 600px;"alt="湿垃圾" src="images/3.jpg"> 
            </div> 
            <div class="col-md-9 col-xs-9" style="color: #8F6F55;padding-left: 22px;vertical-align: middle;" align="center"> 
                <h3 style="margin-top:0px ">湿垃圾</h3> 
                <p style="">即易腐垃圾，指食材废料、剩菜剩饭、过期食品、瓜皮果核、花卉绿植、中药药渣等易腐的生物质生活废弃物。</p> 
            </div> 
          </div> 
        </div> 

        <div class="col-md-6 col-xs-12"> 
          <div class="row" style="border: 1px dashed #dfdfdf;"> 
            <div class="col-md-3 col-xs-3" align="center"> 
              <img style="max-width: 600px;" alt="干垃圾" src="images/2.jpg"> 
            </div> 
            <div class="col-md-9 col-xs-9" style="color: #2F3D39;padding-left: 22px;vertical-align: middle;" align="center"> 
                <h3 style="margin-top: 0px">干垃圾</h3> 
                <p style="">即其它垃圾，指除可回收物、有害垃圾、湿垃圾以外的其它生活废弃物。</p> 
            </div> 
          </div> 
        </div> 
      </div>

  </div>
</div>

</body>
</html>
