<?php 
require_once 'include.php';
$link = mysqli_connect(HOST, USERNAME, PASSWORD, DB);
mysqli_set_charset($link, DB_CHARSET);

 $sql = "select * from medical ";
 
 $totalRows = getResultNum($sql, $link); // 结果集个数
$pageSize = 8; // 每页显示个数
$totalPage = ceil($totalRows / $pageSize); // 总页数
$page = $_REQUEST['page'];
if ($page < 1 || $page == null || ! is_numeric($page)) {
    $page = 1;
}
if ($page > $totalPage) {
    $page = $totalPage;
}
$offset = ($page - 1) * $pageSize; // 取值初始位置

$sql = "select * from medical limit $offset,$pageSize";

@$result = fetchAll($sql, $link);
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
				<li><a href="bookManage.php">预约管理</a></li>
				<li><a href="payMedical.php">购买药品</a></li>
				
			</ul>
		</div>
	</div>
</div>

<div class="bookManage">
	<div class="common-width">
	<div class="book-manage">
		
		
		<table cellspacing="0">
			<tr class="book-manage-table-title">
            	<td>图片</td>
				<td>药品名称</td>
				<td>规格</td>
				<td>价格</td>
				<td>简介</td>
				<td>操作</td>
			</tr>
		<?php 
		
		if ($result) {
		    foreach ($result as $res) {
		?>   
		    <tr style="height:30px;">
		    	<td><img src="<?php echo $res['thumb'];?>" width="200"></td>
		    	<td><?php echo $res['mname'];?></td>
		    	<td><?php echo $res['rules'];?></td>
		    	<td><?php echo $res['price'];?></td>
		    	<td><?php echo $res['description'];?></td>
		    	<td><a href="doOrder.php?act=pmOrder&&oId=<?php echo $res['id'];?>">购买</a></td>		    	
		    </tr>
	  <?php }
		}else {?>
		<tr>
			<td colspan="6" style="height:30px;">没有数据!</td>
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
</body>
</html>