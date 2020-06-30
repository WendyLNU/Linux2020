<?php 
session_start();
include_once("conn.php");
$id_topic=$_GET['id'];
@$_SESSION['topicId']=$id;
//读取帖子名字
@$sql="SELECT * FROM topic WHERE topicId=".$id."";
$result=mysql_query($sql);
@$info_name=mysql_fetch_array($result);

ini_set("display_errors", "Off");
error_reporting(E_ALL^E_NOTICE^E_WARNING);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $info_name['topicTitle'];?></title>
<link href="style/backbtn.css" rel="stylesheet" type="text/css">
<link href="style/Posts.css" rel="stylesheet" type="text/css">
<script>

function del1(a){if(confirm('你确定要删除吗？')){javascript:parent.location.href = 'del1.php?id='+a}}
</script>
<script src="JavaScript/back.js"></script>
</head>

<body>
<iframe src="navigation.php" width="100%"  name="navigation"  class="frame" scrolling="no" frameborder="no" ></iframe>
<!--登陆框架-->
<img class="btn"  id="btn" href="javascript:;"  title="回到顶部"/>
<div style="margin-top:35px;"></div>
<!--开始了-->
<div class="top-bg">
	<div class="top"><?php echo $info_name['boardName']?></div>
</div>
<div class="main-bg">
	<div class="main">
	  <?php
		$sql_mark_one="select * from topic where topicId=".$id."";
		$result_mark_one=mysql_query($sql_mark_one);
		$info_mark_one=mysql_fetch_array($result_mark_one);
		
		$sql ="select * from userinfo where uId=".$info_mark_one['userId']."";
					 $result=mysql_query($sql);	 
					 $info_user=mysql_fetch_array($result);
		
		/*---------------------名字----------------*/
			
				
					echo "<div class='mark_one'>";
					if($info_user['Integral']>=100)
					{
					$dengji="超级会员";	
					}
					else if($info_user['Integral']>=50)
					{
					$dengji="正式会员";	
					}
					else if($info_user['admin']==1)
					{
					$dengji="管理员";		
					}
					else
					{
					$dengji="注册会员";		
					}
					
                	echo "<div class='uhaed-bg'><img  class='uhaed' src='headimages/".$info_user['Head']."'/></div>";			
					echo "<div class='uid'>".$info_user['uName']."</div><div class='sex'>";
					if($info_user['sex']==1)
					{
						echo"	<img style=width:18px; height=18px;' src='images/boy.png' />";
					}
					else
					{
						echo"	<img style=width:18px; height=18px;' src='images/g.png' />";
					}
					
					
					echo "</div><div class='level'>$dengji</div>";
					
					
					/**/
		
		echo $info_mark_one['topicTitle']."<br/></div><div class='markContent'>".$info_mark_one['topicContent']."</div>";
		//上面是要回复的帖子的内容
		
		//下面是我们回复的		
		$sql_mark="select * from reply where topicId=$id ORDER BY postTime asc ";

		$result_mark=mysql_query($sql_mark);
		while($info_mark=mysql_fetch_array($result_mark)){
		echo "<div class='mark'>";
		
		
		
		
					/*用户信息头像*/
					$sql ="select * from userinfo where uId=".$info_mark['userId']."";
					 $result=mysql_query($sql);	 
					 $info_user=mysql_fetch_array($result);
				
					
					if($info_user['Integral']>=100)
					{
					$dengji="超级会员";	
					}
					else if($info_user['Integral']>=50)
					{
					$dengji="正式会员";	
					}
					else if($info_user['admin']==1)
					{
					$dengji="管理员";		
					}
					else
					{
					$dengji="注册会员";		
					}
					
                	echo "<div class='uhaed-bg'><img  class='uhaed' src='headimages/".$info_user['Head']."'/></div>";			
					echo "<div class='uid'>".$info_user['uName']."</div><div class='sex'>";
					if($info_user['sex']==1)
					{
						echo"	<img style=width:18px; height=18px;' src='images/boy.png' />";
					}
					else
					{
						echo"	<img style=width:18px; height=18px;' src='images/g.png' />";
					}
					
					
					echo "</div><div class='level'>$dengji</div><div class='replycontent'>".$info_mark['replyContent']."</div>";
					
				
					
					if($info_mark['userId']==$_SESSION['userID']||$_SESSION['admin']==1){
			
         			    echo  "<img class='del' src='images/del.jpg'  onClick='del1(".$info_mark['replyId'].")'/>";
           	
					}
				echo "</div>";	
			}
    	?>
     
        
        
        
        <div class="reply-div">
        
        <iframe src="reply.php" width="100%"  name="reply"  class="reply" scrolling="no" frameborder="no" ></iframe></div>
<!--发帖框架-->
    </div>
</div>
<div class="bottom-bg">
	<div class="bottom"></div>
</div>


</body>
</html>