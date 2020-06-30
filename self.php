<?php 
include_once("conn.php");
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link href="style/self.css" rel="stylesheet" type="text/css">
<link href="style/backbtn.css" rel="stylesheet" type="text/css">
<script>
function del(a){if(confirm('你确定要删除吗？')){javascript:parent.location.href = 'del.php?id='+a}}
function xiugai(a){javascript:parent.location.href = 'xiugai.php?id='+a}



function cls1(){with(event.srcElement)if(value==defaultValue)value=""}
function res1(){with(event.srcElement)if(value=="") value=defaultValue}
function cls(){with(event.srcElement)if(value==defaultValue) value="",type="password"}
function res(){with(event.srcElement)if(value=="") value=defaultValue,type="text"}

</script>
<script src="JavaScript/back.js"></script>
</head>

<body>
<iframe src="navigation.php" width="100%"  name="navigation"  class="frame" scrolling="no" frameborder="no" ></iframe>
<div style="margin-top:35px;"></div>
<div class="top"></div>
<div class="main">
  <div class="info">
  <div style="width:10px; height:20px; background-color:#09F; border-radius:5px; float:left; margin-right:5px;"></div>
  <span style="float:left; padding-left:5px;">我的信息</span>
  </div>
  <div class="my">
    <div class="myleft">
    <?php

    //评论信息
    $sql_com="select count(*) as ss from message where user_fk=".$_SESSION['userID'];
    $com_res = mysql_query($sql_com);
    $com_info = mysql_fetch_array($com_res);
    $com_sum = $com_info['ss'];
					/*用户信息头像*/
					$sql ="select * from userinfo where uId=".$_SESSION['userID']."";
					 $result=mysql_query($sql);
					 
					 $info_user=mysql_fetch_array($result);
					
                	echo "<div class='uhaed-bg'><img  class='uhaed' src='headimages/".$info_user['Head']."'/></div>";
 					
					echo "<div class='uid'>";
					echo "".$info_user['uName']."</div><div class='level'>";
					
					
					/*会员等级*/
					if($info_user['Integral']>=100)
					{
					echo "<span style='color:red;'>超级会员</span>";	
					}
					else if($info_user['Integral']>=50)
					{
					echo "<span style='color:red'>正式会员</span>";	
					}
					else if($info_user['admin']==1)
					{
					echo "<a href='admin.php' style='color:red'>管理员设置</a>";
					}
					else
					{
					echo "注册会员";	
					}
					echo "</div>";
					
					
					$sql_topic="SELECT count(topicId)as num FROM topic WHERE userId=".$_SESSION['userID']."";
					$sql_reply="SELECT count(replyId)as num FROM reply WHERE userId=".$_SESSION['userID']."";
					$result1=mysql_query($sql_topic);
					$result2=mysql_query($sql_reply);
					$info1=mysql_fetch_array($result1);
					$info2=mysql_fetch_array($result2);
                	 ?>
     
      <div class="fans">
      
      <?php 
	  
	  if($info_user['sex']==1)
					{
						echo"	<img style=width:18px; height=18px;' src='images/boy.png' />";
					}
					else
					{
						echo"	<img style=width:18px; height=18px;' src='images/g.png' />";
					}
	  
	  ?>
      
      </div>
    </div>
    <div class="myright">
      <div class="tiezi1">
        <ul>
          
          <li>评论数：<?php echo $com_sum;?></li>
          
        </ul>
      </div>
    </div>
  </div>
  <div class="user"></div>
  <div class="news"></div>
  <div class="nav">
    <ul>
    
    
    
      <li class="nav1">最新动态
        <div class="newmove">
          <div class="Ntop">我的评论</div>
          
         <?php 
		 $sql="select * from message where user_fk=".$_SESSION['userID']." order by message_time DESC";
		 $result=mysql_query($sql);
		 while($info_topic=mysql_fetch_array($result))
		 {
		  echo "<div class='mark'><a href=''>".$info_topic['message_content']."</a><span style='float:right'>".$info_topic['message_time']."</span></div>";
		  
		  }
		 ?>
        </div>
      </li>
      <li class="nav2">头像设置
      
        <div id="nav1">最新动态
        <div class="newmove">
          <div class="Ntop">我的帖子</div>
          <div class="mark">123123</div>
          <div class="mark">123123</div>
          <div class="mark">123123</div> 
        </div>
        </div>
        
        <div class="head">
          <div class="Ntop">修改个人头像</div>
          <div class="Nbottom">
            <div class="Bleft"><span class="head-now-txt">当前头像</span>
            <?php $sql ="select * from userinfo where uId=".$_SESSION['userID']."";
					 $result=mysql_query($sql);
					 $info_user=mysql_fetch_array($result);
                	echo "<div class='head-now-bg'><img  class='head-now' src='headimages/".$info_user['Head']."'/></div>";	
			?>
           
            </div>
            <div class="Bright"><span class="head-now-txt">上传头像</span>
            <div class='head-now-bg1'><img  class='head-now1' src="images/up.jpg"/></div>
            <form name="form1" method="post" action="uploadfile.php" enctype="multipart/form-data">
                <input type="file" name="tarGetPic" id="tarGetPic" class="file">
                <input type="submit" name="sumit" id="sumit" value="提交" class="submit">              
            </form>
            </div>
          </div>
        </div>
      </li>
      
      
      
      
      
      <li class="nav3">个人设置
        <div id="nav1">最新动态</div>
        <div class="user">
          <div class="Ntop2">修改个人资料</div>
          <div class="Nmiddle2">
            <p>
            <?php 
	
			 if(isset($_POST['submit2']))
			{
			include_once("conn.php");
			mysql_query("SET NAMES UTF8");
			$sex=$_POST['sex'];
			$sql = "update userinfo set sex = $sex where uId =".$_SESSION['userID']."";
			$result_sex=mysql_query($sql);
			if($result_sex)
			{	
				
				echo "<script>alert('成功!');location.href = 'self.php';</script>";
			
			}
			else
			{	
				
				echo "<script>alert('失败!');history.back();</script>";
			}	
			
			
		   }
			
			?>
               <form name="form2" method="post" action="">
              <label>
                <input type="radio" name="sex" value="1" id="sex_0" <?php if($info_user['sex'] == 1){echo "checked";} ?>>
                男</label>  
              <label>
                <input type="radio" name="sex" value="0" id="sex_1" <?php if($info_user['sex'] == 0){echo "checked";}?>>
                女</label>
                
                <input type="submit" name="submit2" id="sumit2" value="提交" class="submit2">     
                </form>
              <br>
            </p>
          </div>
          <div class="Nbottom2"></div>
        </div>
      </li>
      
      
      
      
      <li class="nav4">安全设置
        <div id="nav1">最新动态</div>
        <div class="safe">
          <div class="Ntop2">修改安全信息</div>
          <div class="Nmiddle3">
          
           <?php 
	
			 if(isset($_POST['submit3']))
			{
			include_once("conn.php");
			mysql_query("SET NAMES UTF8");
			$userName = $_POST['uName'];
			$userPW = $_POST['Pwd'];
			$sql = "update userinfo set uPass = '".md5($userPW)."' where uId =".$_SESSION['userID']."";
			$result=mysql_query($sql);

			if($result)
			{	
				
				echo "<script>alert('成功!');location.href = 'self.php';</script>";
			
			}
			else
			{	
				
				echo "<script>alert('失败!');history.back();</script>";
			}	
		   }
		   ?>
           <form  action="" name="form" method="post" >
             <input name="Pwd"   class="circle"  value="密码"  type="text" style="color: #666" onFocus="cls(),this.style.color='#000';" onBlur="res()"   dataType="Custom" >
            <input name="submit3"  class="zc" type="submit" value="修改"  ></li>
            
            </form>
          
          </div>
        </div>
      </li>
    </ul>
  </div>
</div>
<div class="bottom"></div>
</body>
</html>