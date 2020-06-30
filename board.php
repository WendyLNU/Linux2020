<?php 
session_start();
include_once("conn.php");
$id=$_GET['id'];
$_SESSION['board']=$id;
ini_set("display_errors", "Off");
error_reporting(E_ALL^E_NOTICE^E_WARNING);
//读取板块名字
$sql="SELECT * FROM board WHERE boardId=".$id."";
$result=mysql_query($sql);
$info_name=@mysql_fetch_array($result);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $info_name['boardName']?></title>
<link href="style/backbtn.css" rel="stylesheet" type="text/css">
<link href="style/board.css" rel="stylesheet" type="text/css">
<script src="JavaScript/back.js"></script>
</head>

<body>
<iframe src="navigation.php" width="100%"  name="navigation"  class="frame" scrolling="no" frameborder="no" ></iframe>
<!--登陆框架-->
<img class="btn"  id="btn" href="javascript:;"  title="回到顶部"/>
<div style="margin-top:35px;"></div>
<!--开始了-->

<div class="top-bg<?php echo $id;?>">
	<div class="top<?php echo $id;?>"></div>
</div>
<div class="main-bg">
	<div class="main">
    	<?php
		
		//引用分页函数
include_once("page.php");

$sql="select * from topic where boardId=$id order by postTime desc";
$result = mysql_query($sql);
$cout_rows = @mysql_num_rows($result);

pageft($cout_rows, 5, $cout_rows);
$sql .= " limit $firstcount, $displaypg";
$result = mysql_query($sql);   
		
		
		if(!$result)
		{
			echo "<p style='margin-left:63px'>这个板块好冷清，还没人发过贴！</p>";
		}
		while($info_mark=@mysql_fetch_array($result)){
			
				   	$sql ="select * from userinfo where uId=".$info_mark['userId']."";
					 $result1=mysql_query($sql);		 
					 $info_user=mysql_fetch_array($result1);
			
					if((mb_strlen($info_mark['topicContent']))>5)
								{  
  							 	 $newStr = mb_substr($info_mark['topicContent'],0,60,"UTF8")."...";  
								} 
								
								
			echo "<div class='mark'><div class='left'><a href='Posts.php?id=".$info_mark['topicId']."'>".$info_mark['topicTitle']."</a><br/>". $newStr."</div><div class='right'>". $info_user['uName']."<br/>".date('Y-m-d H:i:s',($info_mark['postTime']+28797))."</div></div>";
		
			
		}
//页尾显示
echo  "<div class='weiye'>$pagenav</div>";  
?>
        <div class="topic-div">
        <iframe src="topic.php" width="100%"  name="topic"  class="topic" scrolling="no" frameborder="no" ></iframe></div>

    </div>
</div>
<div class="bottom-bg">
	<div class="bottom"></div>
</div>

</body>
</html>