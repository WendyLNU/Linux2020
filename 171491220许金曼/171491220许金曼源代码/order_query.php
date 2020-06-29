<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>田园美乡村酒店管理系统</title>
  <link rel="stylesheet" type="text/css" href="admin/css/common.css"/>
  <link rel="stylesheet" type="text/css" href="admin/css/main.css"/>
  <script type="text/javascript" src="admin/js/libs/modernizr.min.js"></script>
  <script type="text/javascript" src="js/check_input.js"></script>
  <script type="text/javascript" src="js/jquery.js"></script>
</head>
<body>
  <div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
      <div class="topbar-logo-wrap clearfix">
        <ul class="top-info-list clearfix">
          <li><a class="on" href="index.php">首页</a></li>
          <li><a class="on" href="online_reserve.php">在线预订</a></li>
          <li><a class="on" href="order_query.php">订单查询</a></li>
        </ul>
      </div>
      <div class="top-info-wrap">
        <ul class="top-info-list clearfix">
          <li><a class="on" href="admin/index.php">酒店管理</a></li>
          <li><a class="on" href="about.php">关于我们</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container clearfix">
    <div class="sidebar-wrap">
      <div class='sidebar-title'>
        <h1><?php echo date("Y/m/d"); ?></h1>
      </div>
      <div style="text-align: center">
          <!--img alt="" style="width: 180px; height: 164px" src="./images/t1.jpg"-->
          <img alt="" style="width: 180px; height: 320px" src="./images/t2.jpg">
          <img alt="" style="width: 180px; height: 320px" src="./images/t3.jpg">
      </div> 
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
      <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="index.php">网站首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">订单查询</span></div>
      </div>
      <div class="search-wrap">
        <div class="search-content">
        <?php 
          echo "<form action='order_query.php' method='post'>";
          echo "<table class='search-tab'>";
          echo "<tr>";
          echo "<th width='120'>查询条件</th>";
          echo "<td>";
          echo "<select name='search-type' id=''>";
          echo "<option value='roomid' selected>房间号</option>";
          echo "<option value='cardid'>证件号</option>";
          echo "<option value='linkman'>姓名</option>";
          echo "<option value='phone'>联系电话</option>";
          echo "</select>";
          echo "</td>";
          echo "<th width='70'>关键字</th>";
          echo "<td><input class='common-text' placeholder='请输入相应关键字' name='keywords' value='' id='' type='text'></td>";
          echo "<td height='20'><div align='right'>验证码：</div></td>";
          echo "<td width='66' height='20'><div align='left'><input type='text' name='yz' size='4' class='inputcss'></div></td>";
          echo "<td width='64'><div align='left'>";

            $num=intval(mt_rand(1000,9999));
            for($i=0;$i<4;$i++)
            {
              echo "<img src=images/code/".substr(strval($num),$i,1).".gif>";
            }

          echo "</div></td>";
          echo "<td><input type='hidden' value='".$num."' name='num'><input class='btn btn-primary btn2' name='sub' value='查询' type='submit'></td></tr>";
          echo "</table>";
          echo "</form>";
        ?>
        </div>
      </div>
      <div class="result-wrap">
        <div class="result-content">
          <table class="result-tab" width="100%">
            <tr>
              <th class="tc">订单流水</th>
              <th class="tc">房间号</th>
              <th class="tc">证件号</th>
              <th class="tc">入住时间</th>
              <th class="tc">离开时间</th>
              <th class="tc">房间类型</th>
              <th class="tc">联系人</th>
              <th class="tc">联系电话</th>
              <th class="tc">网上预定</th>
              <th class="tc">完成交易</th-->
            </tr>
            <?php
              require("dbconnect.php");
              $yz=@$_POST["yz"];
              $num=@$_POST["num"];
              //echo "yz=".$yz;
              //echo "num=".$num;
              if(strval($yz)!=strval($num))
              {
                echo "<script>alert('验证码输入错误!');history.go(-1);</script>";
                exit;
              }
  
              $pagesize=20;
              $sql = "select a.orderid,a.roomid,a.cardid,a.entertime,a.leavetime,b.typename,a.linkman,a.phone,a.ostatus,a.oremarks from orders a,roomtype b where a.typeid=b.typeid and a.".@$_POST["search-type"]." like ('%".@$_POST["keywords"]."%')";
              //echo $sql;
              $rs=mysqli_query($db_link,$sql);
              if(!$rs)
              {
                  echo "无满足条件的记录！";
                  exit;
              }
              $recordcount=mysqli_num_rows($rs);
              $pagecount=($recordcount-1)/$pagesize+1;
              $pagecount=(int)$pagecount;
              $pageno=@$_GET["pageno"];
              if($pageno=="")
              {
                  $pageno=1;
              }
              if($pageno<1)
              {
                  $pageno=1;
              }
              if($pageno>$pagecount)
              {
                  $pageno=$pagecount;
              }
              $startno=($pageno-1)*$pagesize;
              $sql="select a.orderid,a.roomid,a.cardid,a.entertime,a.leavetime,b.typename,a.linkman,a.phone,a.ostatus,a.oremarks from orders a,roomtype b where a.typeid=b.typeid and a.".$_POST["search-type"]." like ('%".$_POST["keywords"]."%') order by a.orderid desc limit $startno,$pagesize";
              //echo $sql;
              $rs=mysqli_query($db_link,$sql);
              if(!$rs)
              {
                  echo "无满足条件的记录！";
                  exit;
              }
              while($rows=mysqli_fetch_assoc($rs))
              {
                echo "<tr>";
                echo "<th class='tc'>".$rows["orderid"]."</th>";
                echo "<th class='tc'>".$rows["roomid"]."</th>";
                echo "<th class='tc'>".$rows["cardid"]."</th>";
                echo "<th class='tc'>".$rows["entertime"]."</th>";
                echo "<th class='tc'>".$rows["leavetime"]."</th>";
                echo "<th class='tc'>".$rows["typename"]."</th>";
                echo "<th class='tc'>".$rows["linkman"]."</th>";
                echo "<th class='tc'>".$rows["phone"]."</th>";
                echo "<th class='tc'>".$rows["ostatus"]."</th>";
                echo "<th class='tc'>".$rows["oremarks"]."</th>";
                echo "</tr>";
              }
            ?>
          </table>
          <div class="list-page">
            <tr>
              <?php
                if($pageno==1)
                {
                  echo "首页 | 上一页 | <a href='?pageno='".($pageno+1).">下一页</a> | <a href='?pageno'=".$_POST['search-type']."'>末页</a>";
                }
                else if($pageno==$pagecount)
                {
                  echo "<a href='?pageno=1'>首页</a> | <a href='?pageno='".($pageno-1)."'>上一页</a> | 下一页 | 末页";
                }
                else
                {
                  echo "<a href='?pageno=1'>首页</a> | <a href='?pageno='".($pageno-1)."'>上一页</a> | <a href='?pageno='".($pageno+1)." class='list_page''>下一页</a> | <a href='?pageno='".$pagecount.">末页</a>";
                }
                
                echo "&nbsp;页次：".$pageno."/".$pagecount."页&nbsp;共有".$recordcount."条信息";
              ?>
            </tr>
          </div>
        </div>
      </div>
    </div>
    <!--/main-->
</div>
</body>
</html>