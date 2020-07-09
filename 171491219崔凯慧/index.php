<?php 
require_once 'include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_query($link,"set names utf8;");
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
	<title>欢迎来到儒雅医院在线平台</title>
	<link type="text/css" rel="stylesheet"  href="styles/reset.css">
	<link type="text/css" rel="stylesheet"  href="styles/main.css">
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
				<li class="nav-on"><a href="index.php">首页</a></li>
				<li><a href="docSrcByDis.php?all=100&date=<?php echo date('Y-m-d');?>&page=1">挂号服务</a></li>
				<li><a href="bookManage.php">预约管理</a></li>
				<li><a href="payMedical.php">购买药品</a></li>
				
			</ul>
		</div>
	</div>
</div>

<div class="play-login clearfix">
    <div class="common-width">
	    <div id="play-container" class="fl">
		    <div id="list" style="left: -730px;">
			    <img class="fl" src="images/3.jpg" alt="3">
			    <img class="fl" src="images/1.jpg" alt="1">
			    <img class="fl" src="images/2.jpg" alt="2">
			    <img class="fl" src="images/3.jpg" alt="3">
			    <img class="fl" src="images/1.jpg" alt="1">
		    </div>
		    <div id="buttons">
			    <span index='1' class="on">1</span>
			    <span index='2'>2</span>
			    <span index='3'>3</span>
		    </div>
	    </div>
	    <div class="login-mes fr">
	    	<div class="login-cont">
	    		<div class="login-title">
	    			<p>用户登录</p>
	    		</div>
	    		<form action="dologin.php" method="post">
		    		<div class="login">
		    			<ul>
		    				<li>用户名：</li>
		    				<li class="mb-10"><input type="text" class="login-text user-icon" placeholder="手机号/身份证号" name="username"></li>
		    				<li>密码：</li>
		    				<li class="mb-10"><input type="password" class="login-text user-icon" name="password"></li>
		    				<li>验证码:</li>
					        <li class="mb-10"><input type="text"  name="verify" class="login-text password_icon"></li>
					        <li><img onclick="refreshVerify(this);" src="lib/image.func.php" alt="验证码" title="点击刷新" /></li>
		    				<li class="auto-login">
		    				<input class="checked" type="checkbox" id="a1" name="autoFlag" checked><label for="a1">自动登录</label>
		    				</li>
		    				<li><button class="login-btn">登录</button></li>
		    			</ul>
		    		</div>
	    	    </form>
	    	</div>
	    	<div class="user-mes">
	    		<h1>欢迎您!</h1>
	    		  <p><b>
	    		      <?php echo $_COOKIE['userName'];?> 
        			  <a href="doUserAction.php?act=logout" class="icon icon_e">退出</a>
			      </b></p>
			      <p>预约订单:(<a href="bookManage.php"><?php 
			      $sql = "select * from hospital.order where userId='{$_COOKIE['userId']}'";
				  
			      echo getResultNum($sql, $link)?></a>)</p>
			      <p>购买药品订单:(<a href="payManage.php"><?php 
			      $sql = "select * from hospital.morder where userId='{$_COOKIE['userId']}'";
			      echo getResultNum($sql, $link);?></a>)</p>	    		
	    	</div>	    	
	    </div>
	    <div class="book-step">
			    <img src="images/step.jpg">
			    <img src="images/step1.jpg">
			    <img src="images/step2.jpg">
			    <img src="images/step3.jpg">
			    <img src="images/step4.jpg">
			    <img src="images/step5.jpg">
		</div>
	</div>
</div>

<div class="search-que clearfix">
	<div class="common-width">
		<div class="search fl">
			<div class="search-banner">
				<img src="images/banner2.jpg" alt="">
			</div>
			<ul class="ills" >
			  
	              
				
				    <ul class="ills-list fl">
				<?php 
				   
				    $sql = "select * from disease ";
				    @$rows = fetchAll($sql, $link);
				    if ($rows){
				        foreach ($rows as $row) {				        				
				?>
					 
						
				         <table width=700 border=0 bgcolor="#CCFFFF" style="text-align:center;">
  <tr>
    <td><a href="docSrcByDis.php?disId=<?php echo $row['id'];?>&date=<?php echo date('Y-m-d');?>&page=1" style="color:black ;font-size:15px;"><?php echo $row['disName'];?></a></td>
   
                             
  </tr>
</table> <hr size="0">
				<?php 
				        }
				    }
			    ?>
			        </ul>
				</li>
				
			</ul>
		

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
    function refreshVerify(e) {
    	e.src="lib/image.func.php";
    }
</script>
</body>
</html>