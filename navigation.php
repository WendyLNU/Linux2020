<?php 
//include("loginsubmit.php");
session_start();
ini_set("display_errors", "Off");
error_reporting(E_ALL^E_NOTICE^E_WARNING);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>navigation</title>
<link href="style/navigation.css" rel="stylesheet" type="text/css">
</head>

<body>
<div class="top-bg">	
  <div class="top">
    <div id="nav" style="float:left;width: 700px;">
        <ul class="big">
            <li onClick="javascript:parent.location.href = 'index.php'"  class="shouye">首页</li>
           <li class="yinyue">
           		 音乐
            	<ul>
                	<li onClick="javascript:parent.location.href = 'admin/onlinemusic.php'">华语</li>
                    <li onClick="javascript:parent.location.href = 'admin/onlinemusic.php'">欧美</li>
                    <li onClick="javascript:parent.location.href = 'admin/onlinemusic.php'">日韩</li>
                </ul>
            </li>
            <?php
            if(isset($_SESSION['admin'])){?>

            <li class="music" onClick="javascript:parent.location.href = 'admin/music.php'" style="border-top: 3px red solid;">
                 上传音乐
            </li>
            <li class="music" onClick="javascript:parent.location.href = 'admin.php'" style="border-top: 3px red solid;">
                 评论管理
            </li>
            <?php }else{?>
             <li class="music" onClick="javascript:parent.location.href = 'admin/onlinemusic.php'" style="border-top: 3px green solid;">
                 在线听歌
            </li>
              <?php }?>
        </ul>
    
    
    </div>
    <dt style="float:right"><?php  
 	 if($_SESSION['login'] == 1)
 	 {
		 ?>
         <ul>
         	<li class="dz" style="width:150px;">
            <?php
		echo "您已登陆: ".$_SESSION['uName']; 
		?>
        </li>
         <li  class="dz1" onClick="javascript:parent.location.href = 'out.php'">注销</li>
         <li  class="dz1" onClick="javascript:parent.location.href = '../about.php'">关于作者</li>
         <?php 
	  
	 }
	 else
	 {
            if(isset($_SESSION['admin'])){
                echo '<li class="dz" style="width:150px;">
            您已登陆: admin
        </li>';
            }else{
	 ?>
      <li  class="dz1" onClick="javascript:parent.location.href = 'login.php'">登陆</li>
      <li  class="dz1" onClick="javascript:parent.location.href = '../about.php'">关于作者</li>
     <?php 
        }
	 }
  
  
  ?></ul></dt></div></div>
</body>
</html>