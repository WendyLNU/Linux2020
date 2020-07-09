<?php
require_once 'include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);


@$disId = $_REQUEST['disId'];

$sql = "select * from doctor where id = '$disId'";

$row=fetchOne($sql, $link);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>医生简介</title>
<link rel="stylesheet" type="text/css" href="styles/reset.css">
<link rel="stylesheet" type="text/css" href="styles/main.css">
</head>
<body>
<div class="header-bar">
	<div class="top-bar">
		<div class="common-width">
			<div class="right-area">
				<a href="index.php">首页</a>|
				<a href="register.php">注册</a>|
				
				投诉电话：86868000
			</div>
		</div>
	</div>
	<div class="logo-bar">
		<div class="common-width">
			<h1 class="logo-text">欢迎来到儒雅医院在线平台</h1>
			<p class="phone-text">预约热线：86868000</p>
		</div>
	</div>
	<div class="nav-box">
		<div class="common-width menu">
			<ul class="first-nav">
				<li><a href="index.php">首页</a></li>
				<li class="nav-on"><a href="docSrcByDis.php?all=100&date=<?php echo date('Y-m-d');?>&page=1">挂号服务</a></li>
				<li><a href="bookManage.php">预约管理</a></li>
				<li><a href="payMedical.php">购买药品</a></li>
				
			</ul>
		</div>
	</div>
</div>

	<div class="docSrcByDis">
		<div class="commom-width">
		   
							<p style="text-align:center;"> <img src="images/doctor.jpg"  alt=""></p>
						 <div style="width:1000px;margin: 16px auto;text-align: center;">
                         
<table width="100%" border="1px" cellspacing="0" cellpadding="0" bordercolor=  Olive>
  <tr>
    <td>姓名：<?php echo $row['docname'];?></td>
  </tr>
  <tr>
    <td>年龄：<?php echo $row['age'];?></td>
  </tr>
  <tr>
    <td>毕业院校：<?php echo $row['graduateschool'];?></td>
  </tr>
  <tr>
    <td>等级：<?php echo $row['position']." ";?></td>
  </tr>
  <tr>
    <td>所在科室：<?php echo $row['department'];?></td>
  </tr>
  <tr>
    <td>具体介绍：<?php echo $row['description']; ?></td>
  </tr>
</table>

			</div>				
						
                       
		</div>
	</div>

	<div class="hr-25"></div>
	<div class="footer">
		<p>171491219崔凯慧作品</p>
		<pre>Copyright © 2020 - 2020 个人版权所有 京ICP备案号0000000000</pre>
		
	</div>
	<script type="text/javascript">
// 1.用户是否登录，没有登录提示登录
// 2.如果登录，根据用户订单修改状态
var btn = document.getElementsByClassName("btn");
for(var i = 0; i < btn.length; i++) {
	btn[i].onclick = function () {
		var myselect= document.getElementById("select");
		var index=myselect.selectedIndex ;
		var selectValue = myselect.options[index].text;
		var docId = this.getAttribute("index1");
		var timeFrame = this.getAttribute("index2");
		if (confirm("一位医师只能预约一个时间段，确定预约吗?预约费5元！")) {
			window.location = "doOrder.php?act=cOrder&index1=" + docId +"&index2=" + timeFrame +"&date=" + selectValue;
		}
	}
}
var datebtn = document.getElementById('datebtn');
datebtn.onclick = function () {
	var myselect= document.getElementById("select");
	var index=myselect.selectedIndex ;
	var selectValue = myselect.options[index].text;
	url = window.location.href;
	var index = url.indexOf("&",0);
	url=url.substring(0,index);
	window.location = url+"&date="+selectValue+"&page=1";
}
</script>
</body>
</html>