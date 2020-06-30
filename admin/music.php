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

            <li class="music" onClick="javascript:parent.location.href = 'admin/music.php'" style="border-top: 3px red solid;">
                 上传音乐
            </li>
            <?php }?>
        </ul>
    
    
    </div>
    <dt style="float:right">
         <ul>
              <?php  
              if(isset($_SESSION['admin']))
             {?>
         	  <li class="dz" style="width:150px;">
              <?php
          		  echo "您已登陆: admin"; 
          		?>
            </li>
            <li  class="dz1" onClick="window.location.href='unsession.php'">注销</li>
            <li  class="dz1" onClick="javascript:parent.location.href = '../about.php'">关于作者</li>
              <?php  }else{ ?>  
            <li  class="dz1" onClick="window.location.href='../login.php'">登陆</li>
            <li  class="dz1" onClick="javascript:parent.location.href = '../about.php'">关于作者</li>
              <?php  }?>
          </ul>
      </dt>
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
    <td><a href="delMusic.php?id=<?php echo $value['Id']?>">删除</a></td>
  </tr>
 <?php
}
 if(isset($_GET['flg']) && $_GET['flg'] == '1'){
  $r = uploadFile("music_file","./musicFile",10);
  $_POST['musicFile'] = $r[0];
  $db->insert("music",$_POST);
  $db->href("music.php");
 }
 ?>
  <form action="music.php?flg=1" method="post" enctype="multipart/form-data">
  <tr id="addTr" style="display: none;">
    <td><input type="file" name="music_file" /></td>
    <td><input type="text" style="color: #000;" name="name" placeholder="音乐名称" /></td>
    <td><input type="text" style="color: #000;" name="zhuanji" placeholder="专辑" /></td>
    <td><input type="text" style="color: #000;" name="time" placeholder="发行时间" /></td>
    <td><input type="text" style="color: #000;" name="leixing" placeholder="歌曲所属类型" /></td>
    <td><input type="text" style="color: #000;" name="stcj" placeholder="歌曲适听场景" /></td>
    <td><input type="text" style="color: #000;" name="describ" placeholder="歌手" /></td>
    <td><input type="submit" value="提交" style="padding:7px 10px;color:#000;"></td>
  </tr>
  </form>
   <tr>
   <td colspan="8" class="addMusic">添加</td>
  </tr>
  </table>
  </div>

</div>
 <script>
  document.querySelector(".addMusic").onclick = function(){
    document.querySelector("#addTr").style.display = 'table-row';
  };
  </script>
</body>
</html>
