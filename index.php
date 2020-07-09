<?php 
include_once("conn.php");
session_start();
ini_set("display_errors", "Off");
error_reporting(E_ALL^E_NOTICE^E_WARNING);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>首页</title>
<link href="style/index.css" rel="stylesheet" type="text/css">
<link href="style/backbtn.css" rel="stylesheet" type="text/css">

<script src="JavaScript/back.js"></script>
</head>

<body style="height: 100%;overflow: hidden;">
<iframe src="navigation.php" width="100%"  name="navigation"  class="frame" scrolling="no" frameborder="no" ></iframe>
<div style="margin-top:35px;"></div>
<div class="top-bg tm">
	<div class="top"></div>
</div>
<div class="main-bg">
	<div class="main">
    	<div class="main-left" style="margin-top: 200px;">
        	<?php
			$css=0;
			$sql="SELECT * FROM board WHERE boardId=2";
			 $result=mysql_query($sql);
			 $info_name=mysql_fetch_array($result);
			 //读取板块名字			 		
			 echo "<div class='board'><div class='board-name'>".$info_name['boardName']."</div>";
			 ?>
             <?php 
             $css =3;
				 for($j=0;$j<3;$j++)
				 {//读取字板块名字

					 $css++;
					 $sql="SELECT * FROM board WHERE parentId='2' LIMIT ".$j.",1";
	 
					 $result=mysql_query($sql);
					 $info_son=mysql_fetch_array($result);
					 echo "<a href='admin/onlinemusic.php'><div class='son-board" .$css." son-hover yuan'></div></a>";
					 // echo "<a href='board.php?id=".$info_son['boardId']."'><div class='son-board" .$css." son-hover yuan'></div></a>";
				 }
			 echo "</div>";
			?>
        </div>
        <div class="main-right">
        	<div class="user">
            	<div class="uhaed-bg">
                	<?php
					/*用户信息头像*/
					$sql ="select * from userinfo where uId=".$_SESSION['userID']."";
					 $result=mysql_query($sql);
					 if(!$result)
					 {
						echo "<img  class='uhaed'src='headimages/0.jpg'/>";
						echo "<div ><a href='login.php' class='self' style='color: #fff;margin-top:50px;'>请先登录</a></div>";
						exit; 
					}
					 $info_user=mysql_fetch_array($result);
					
                	echo "<img  class='uhaed'src='headimages/".$info_user['Head']."'/>";
 					
					echo "<div class='name'>";
					echo "<br/>".$info_user['uName']."";
					
					
					/*会员等级*/
					if($info_user['Integral']>=100)
					{
					echo "<br/><span style='color:red'>超级会员</span>";	
					}
					else if($info_user['Integral']>=50)
					{
					echo "<br/><span style='color:red'>正式会员</span>";	
					}
					else if($info_user['admin']==1)
					{
					// echo "<br/><a href='admin.php' style='color:red'>管理员设置</a>";
					}
					else
					{
					echo "<br/>注册会员";	
					}
					echo "</div>";
                	 ?>
               	  <a class="self" href="self.php?id=".<?php echo $_SESSION['userID']?>."">个人中心</a>
				</div>
            </div>
            
        </div>
    </div>
</div>
<div class="bottom-bg">
	<div class="bottom"></div>
</div>

</body>
</html>