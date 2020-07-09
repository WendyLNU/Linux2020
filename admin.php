<?php 
include_once("conn.php");
session_start();
// $id=$_GET['id'];

printf("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\">");
mysql_query("set character set 'utf8'");//读库 
mysql_query("set names 'utf8'");//写库
if($_SESSION['admin']==0)
{	echo "<script>alert('还不是管理员登陆！');</script>";
	echo "<script>parent.location.href='login.php'</script>";
	exit;	
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link href="style/admin.css" rel="stylesheet" type="text/css">
<link href="style/backbtn.css" rel="stylesheet" type="text/css">
<script>
function del(a){if(confirm('你确定要删除吗？')){javascript:parent.location.href = 'del.php?id='+a}}
function del1(a){if(confirm('你确定要删除吗？')){javascript:parent.location.href = 'del1.php?id='+a}}
</script>
<script src="JavaScript/back.js"></script>
</head>

<body>
<iframe src="navigation.php" width="100%"  name="navigation"  class="frame" scrolling="no" frameborder="no" ></iframe>

<div style="margin-top:0px;">
</div>

<div class="main">
<?php 
		if(isset($id) && $id==1)
{
$sql="select * from topic";

$result=mysql_query($sql);
while($info=mysql_fetch_array($result))
		 {
			 $sql1="select count(topicId) as num from reply where  topicId=".$info['topicId']."";
			 $reuslt1=mysql_query($sql1);
		     $info1=mysql_fetch_array($reuslt1);
			echo "<div class='mark'><a href='Posts.php?id=".$info['topicId']."'>".$info['topicTitle']."</a><span style='float:right'>".date('Y-m-d H:i:s',($info['postTime']+28797))."</span><img class='del' src='images/del.jpg'  onClick='del(".$info['topicId'].")'/><span style='float:right'>回复：".$info1['num']."</span></div>";
		  }
//如果是1就是全部发帖
}
else
{
// $sql="select * from reply";
$sql="select * from message";
$result=mysql_query($sql);
while($info=mysql_fetch_array($result))
		 {
			echo "<div class='mark'>".$info['message_content']."</a><span style='float:right'>".$info['message_time']."</span><img class='del' src='images/del.jpg'  onClick='del1(".$info['Id'].")'/></div>";
			// echo "<div class='mark'>".$info['replyContent']."</a><span style='float:right'>".date('Y-m-d H:i:s',($info['postTime']+28797))."</span><img class='del' src='images/del.jpg'  onClick='del1(".$info['replyId'].")'/></div>";
		  }
}
		
?>

</div>
</body>
</html>