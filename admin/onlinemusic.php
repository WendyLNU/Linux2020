<?php 
  require_once "Mysql.class.php";
  require_once "upload.php";
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>navigation</title>
    <link href="../style/navigation.css" rel="stylesheet" type="text/css">
    <link href="../style/board.css" rel="stylesheet" type="text/css">

</head>
<body style="background-image: url('../images/1.jpg');">
<div class="top-bg">	
  <div class="top">
    <div id="nav" style="float:left;width: 700px;">
        <ul class="big">
            <li onClick="window.location.href='../index.php'"  class="shouye">首页</li>
           <li class="yinyue">
           		 音乐
            	<ul>
                	<li onClick="javascript:parent.location.href = 'onlinemusic.php'">华语</li>
                    <li onClick="javascript:parent.location.href = 'onlinemusic.php'">欧美</li>
                    <li onClick="javascript:parent.location.href = 'onlinemusic.php'">日韩</li>
                </ul>
            </li>
           <?php
            if(isset($_SESSION['admin'])){?>

            <li class="music" onClick="javascript:parent.location.href = 'admin/music.php'" style="border-top: 3px red solid;">
                 上传音乐
            </li>
            <?php }else{?>
             <li class="music" onClick="javascript:parent.location.href = 'onlinemusic.php'" style="border-top: 3px green solid;">
                 在线听歌
            </li>
              <?php }?>
        </ul>
    
    
    </div>
     <dt style="float:right"><?php  
   if(isset($_SESSION['login']) && $_SESSION['login'] == 1)
   {
     ?>
         <ul>
          <li class="dz" style="width:150px;">
            <?php
    echo "您已登陆: ".$_SESSION['uName']; 
    ?>
        </li>
         <li  class="dz1" onClick="javascript:parent.location.href = 'unsession.php'">注销</li>
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
      <li  class="dz1" onClick="javascript:parent.location.href = '../login.php'">登陆</li>
      <li  class="dz1" onClick="javascript:parent.location.href = '../about.php'">关于作者</li>
     <?php 
        }
   }
  
  
  ?></ul></dt>
    </div>



  <div>

    <div class="top-bg14">
      <div class="top14"></div>
    </div>
  </div>
  <div style="width: 100%;text-align: center;">
  <table style="width: 1200px;border:1px lightgray solid;margin-left: 200px;" border="1">
  <tr>
    <th>序号</th>
    <th>音乐名称</th>
    <th>专辑</th>
    <th>发行时间</th>
    <th>歌曲所属类型</th>
    <th>歌曲适听场景</th>
    <th>歌手</th>
    <th>操作</th>
  </tr>
  <?php
  $getAllMusic = "select * from music";
  $musicArr = $db->selectArray($getAllMusic);
  foreach ($musicArr as $key => $value) {
  ?>
  <tr>
    <td><?php echo $key+1?></td>
    <td><?php echo $value['name']?></td>
    <td><?php echo $value['zhuanji']?></td>
    <td><?php echo $value['time']?></td>
    <td><?php echo $value['leixing']?></td>
    <td><?php echo $value['stcj']?></td>
    <td><?php echo $value['describ']?></td>
    <td><a href="music-details.php?id=<?php echo $value['Id']?>">点击播放</a></td>
  </tr>
 <?php }?>
  </table>

  </div>

</div>
</body>
</html>
