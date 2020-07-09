<?php 
require_once 'include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

if (isset($_COOKIE['userId']) && isset($_COOKIE['userName'])) {
    $sql = "select * from user where id={$_COOKIE['userId']}";
    
    $row = fetchOne($sql, $link);
} else {
    alertMes("请登录！", "index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>欢迎来到儒雅医院在线平台</title>
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
				<li><a href="docSrcByDis.php?all=100&date=<?php echo date('Y-m-d');?>&page=1">挂号服务</a></li>
				<li class="nav-on"><a href="bookManage.php">预约管理</a></li>
				<li><a href="payMedical.php">购买药品</a></li>
				
			</ul>
		</div>
	</div>
</div>

<div class="payManage">
	<div class="common-width">
	<div class="book-manage">
		<div class="book-mes">
			<table>
				<tr>
					<td>真实姓名:<?php echo $row['realname'];?></td>
					<td>用户名:<?php echo $row['username'];?></td>
				</tr>
				<tr>
					<td>证件号:<?php echo $row['identity'];?></td>
					<td>手机号码:<?php echo $row['phone']?></td>
				</tr>
				<tr>
					<td colspan="2" style="color: red;">
							请注意：请按时就诊，如不能按时就诊请在就诊前一天取消预约。
					</td>
				</tr>
			</table>
			<hr>			
		</div>
		
		<table cellspacing="0">
			<tr class="pay-manage-table-title">
				<td>药品名</td>
				<td>购买时间</td>
				<td>购买状态</td>
				<td>购买数量</td>
			</tr>
		<?php 
		$sql = "select * ,count(*) as bc from hospital.morder where userId={$_COOKIE['userId']} group by mname";
		
		@$result = fetchAll($sql, $link);
		if ($result) {
		    foreach ($result as $res) {
		?>   
		    <tr style="height:30px;" align="center">
		    	<td><?php echo $res['mname'];?></td>
		    	<td><?php echo $res['buytime'];?></td>
		    	<td><?php echo $res['paystatue'];?></td>
		        <td><?php echo $res['bc'];?></td>
		    </tr>
	  <?php }
		}else {?>
		<tr>
			<td colspan="3" style="height:30px;">没有数据!</td>
		</tr>
	    <?php }?>
	    </table>
	</div>
	</div>
</div>

<div class="hr-25"></div>
<div class="footer">
	<p>171491219崔凯慧作品</p>
	<pre>Copyright © 2020 - 2020 个人版权所有 京ICP备案号0000000000</pre>
	
</div>
<script type="text/javascript" src="scripts/index.js"></script>
<script type="text/javascript">
	// var login_cont = document.getElementsByClassName('login-cont');
	// login_cont.style.display = 'none';
	// var user_mes = document.getElementsByClassName('user-mes');
	// user_mes.style.display = 'block';
	function exit (argument) {
		delete document.cookie;
	}
</script>
</body>
</html>