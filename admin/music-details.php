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
                	<li onClick="window.location.href='onlinemusic.php'">华语</li>
                    <li onClick="window.location.href='onlinemusic.php'">欧美</li>
                    <li onClick="window.location.href='onlinemusic.php'">日韩</li>
                </ul>
            </li>
            
            <?php
            if(isset($_SESSION['admin'])){?>

            <li class="music" onClick="javascript:parent.location.href = 'music.php'" style="border-top: 3px red solid;">
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
  <?php
  $musicId = $_GET['id'];
  $getMusic = "select * from music where Id = $musicId";
  $musicArr = $db->selectOne($getMusic);
  ?>
    <tr>
      <td colspan="4">歌曲名：<?php echo $musicArr['name']?></td>
    </tr>
    <tr>
      <td>专辑：<?php echo $musicArr['zhuanji']?></td>
      <td>发行时间：<?php echo $musicArr['time']?></td>
      <td>歌曲类型：<?php echo $musicArr['leixing']?></td>
      <td>适合场景：<?php echo $musicArr['stcj']?></td>
    </tr>
    <tr>
    <td colspan="4">
      <audio controls="controls" autoplay="autoplay">
        <source src="<?php echo $musicArr['musicFile']?>" type="audio/mpeg" />
      </audio>
    </td>
    </tr>
    <tr>
      <td colspan="4"><?php echo $musicArr['describ']?></td>
    </tr>
  </table>


  <table style="width: 1200px;border:1px lightgray solid;margin-left: 200px;margin-top: 80px;" border="1">
    <?php
    $getAllmessgae = "select * from message where product_fk = $musicId";
    $messageArr = $db->selectArray($getAllmessgae);
    foreach ($messageArr as $key => $value) {
    ?>
    <tr>
      <td><?php 
        $userId = $value['user_fk'];
        $userSql = "select * from userinfo where uId = $userId limit 1";
        $userArr = $db->selectOne($userSql);
        echo $userArr['uName'];
      ?></td>
      <td style="width: 200px;"><?php echo $value['message_time']?></td>
      <td><?php echo $value['message_content']?></td>
    </tr>
    <?php }?>
    <?php
    if(isset($_GET['flg']) && $_GET['flg'] == 'insertMessage'){
      if(isset($_SESSION['userID'])){
        $_POST['user_fk'] = $_SESSION['userID'];
        $_POST['message_time'] = date("Y-m-d h:i:s");
        $musicId = $_GET['id'];
        $_POST['product_fk'] = $musicId;
        $_POST['parent_fk'] = 0;
        $db->insert("message",$_POST);
        $db->history();
      }else{
        $db->msg("请先登录");
        $db->href("../login.php");
      }
    }
    ?>
    <form action="music-details.php?flg=insertMessage&id=<?php echo $musicId?>" method="post">
      <tr>
        <td colspan="2"><input type="text" style="color: #000;" name="message_content" placeholder="输入留言" required="required" /></td>
        <td><input type="submit" style="color: #000;padding:7px 10px" /></td>
      </tr>
    </form>
  </table>
  </div>

</div>
</body>
</html>