<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>田园美乡村酒店后台管理</title>
  <link rel="stylesheet" type="text/css" href="css/common.css"/>
  <link rel="stylesheet" type="text/css" href="css/main.css"/>
  <script type="text/javascript" src="js/libs/modernizr.min.js"></script>
</head>
<body>
  <div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
      <div class="topbar-logo-wrap clearfix">
        <ul class="navbar-list clearfix">
          <li><a class="on" href="admin_index.php">网站后台</a></li>
          <li><a href="../index.php">网站首页</a></li>
        </ul>
      </div>
      <div class="top-info-wrap">
        <ul class="top-info-list clearfix">
          <li>登录用户：<?php session_start(); echo $_SESSION["aname"]; ?></li>
          <li><a href="admin_logout.php"><i class="icon-font">&#xe9b6;</i>退出</a></li>
        </ul>
      </div>
    </div>
  </div>
  <div class="container clearfix">
    <div class="sidebar-wrap">
      <div class="sidebar-title">
        <h1>管理菜单</h1>
      </div>
      <div class="sidebar-content">
        <ul class="sidebar-list">
          <li>
            <a href="#">入住管理</a>
            <ul class="sub-menu">
              <li><a href="admin_addn.php"><i class="icon-font">&#xe960;</i>大堂入住</a></li>
              <li><a href="admin_addo.php"><i class="icon-font">&#xe960;</i>订单入住</a></li>
              <li><a href="admin_queryo.php"><i class="icon-font">&#xe986;</i>入住查询</a></li>
              <li><a href="admin_counto.php"><i class="icon-font">&#xe99a;</i>入住统计</a></li>
            </ul>
          </li>
          <li>
            <a href="#">退房管理</a>
            <ul class="sub-menu">
              <li><a href="admin_checkout.php"><i class="icon-font">&#xe994;</i>退房清算</a></li>
            </ul>
          </li>
          <li>
            <a href="#">房间管理</a>
            <ul class="sub-menu">
              <li><a href="admin_addh.php"><i class="icon-font">&#xe995;</i>新增房间</a></li>
              <li><a href="admin_roommgr.php"><i class="icon-font">&#xe994;</i>房间管理</a></li>
            </ul>
          </li>
          <li>
            <a href="#">房类管理</a>
            <ul class="sub-menu">
              <li><a href="admin_addt.php"><i class="icon-font">&#xe995;</i>新增房类</a></li>
              <li><a href="admin_rtypemgr.php"><i class="icon-font">&#xe994;</i>房类管理</a></li>
            </ul>
          </li>
          <li>
            <a href="#">系统管理</a>
            <ul class="sub-menu">
              <li><a href="admin_chpwd.php"><i class="icon-font">&#xe991;</i>密码修改</a></li>
              <li><a href="admin_logout.php"><i class="icon-font">&#xe9b6;</i>退出系统</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
    <!--/sidebar-->
    <div class="main-wrap">
      <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">退房清算</span></div>
      </div>
      <div class="search-wrap">
        <div class="search-content">
          <form action="admin_checkout.php" method="post">
            <table class="search-tab">
              <tr>
                <th width="200"></th>
                <th width="120">请输入房间号</th>
                <td><input class="common-text" placeholder="房间号" name="roomid" value="" id="" type="text"></td>
                <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <div class="result-wrap">
        <div class="result-content">
          <table class="result-tab" width="100%">
            <?php
              require("../dbconnect.php");
              echo "";
              echo "<tr>顾客信息如下，请确认：</tr>";
              echo "<tr>";
              echo "<th class='tc'>证件类型</th>";
              echo "<th class='tc'>证件号码</th>";
              echo "<th class='tc'>客户姓名</th>";
              echo "<th class='tc'>客户性别</th>";
              echo "</tr>";
              //echo "<br/>";
              $sql = "select a.* from customer a,orders b where a.cardid=b.cardid and b.roomid = '".@$_POST["roomid"]."'";
              $rs=mysqli_query($db_link,$sql);
              if(!$rs)
              {
                  echo "<tr><th>无满足条件的记录！</th><th></th><th></th><th></th></tr>";
                  exit;
              }

              while($rows=mysqli_fetch_assoc($rs))
              {
                echo "<tr>";
                echo "<th class='tc'>".$rows["cardtype"]."</th>";
                echo "<th class='tc'>".$rows["cardid"]."</th>";
                echo "<th class='tc'>".$rows["cname"]."</th>";
                echo "<th class='tc'>".$rows["csex"]."</th>";
                echo "</tr>";
              }
            ?>
          </table>
          <table class="result-tab" width="100%">
            <?php
              //require("../dbconnect.php");
              echo "<br/>";
              echo "<tr>入住信息如下，请确认：</tr>";
              echo "<tr>";
              echo "<th class='tc'>订单流水号</th>";
              echo "<th class='tc'>房间号</th>";
              echo "<th class='tc'>入住时间</th>";
              echo "<th class='tc'>离开时间</th>";
              echo "<th class='tc'>住宿天数（天）</th>";
              echo "<th class='tc'>房间类型</th>";
              echo "<th class='tc'>房间价格（元/天）</th>";
              echo "<th class='tc'>消费金额（元）</th>";
              echo "<th class='tc'>网上预订</th>";
              echo "<th class='tc'>交易完成</th>";
              echo "</tr>";
              echo "<br/>";
              $sql = "select a.orderid,a.roomid,a.entertime,a.leavetime,b.typename,b.price,a.ostatus,a.oremarks,a.typeid from orders a,roomtype b where a.typeid=b.typeid and a.roomid = '".@$_POST["roomid"]."'";
              //echo $sql;
              $rs=mysqli_query($db_link,$sql);
              if(!$rs)
              {
                  echo "<tr><th>无满足条件的记录！</th><th></th><th></th><th></th><th></th><th></th><th></th><th></th></tr>";
                  exit;
              }

              while($rows=mysqli_fetch_assoc($rs))
              {
                $datenum=$rows["leavetime"]-$rows["entertime"];
                $monetary=$rows["price"] * $datenum;
                echo "<tr>";
                echo "<th class='tc'>".$rows["orderid"]."</th>";
                echo "<th class='tc'>".$rows["roomid"]."</th>";
                echo "<th class='tc'>".$rows["entertime"]."</th>";
                echo "<th class='tc'>".$rows["leavetime"]."</th>";
                echo "<th class='tc'>".$datenum."</th>";
                echo "<th class='tc'>".$rows["typename"]."</th>";
                echo "<th class='tc'>".$rows["price"]."</th>";
                echo "<th class='tc'>".$monetary."</th>";
                echo "<th class='tc'>".$rows["ostatus"]."</th>";
                echo "<th class='tc'>".$rows["oremarks"]."</th>";
                echo "</tr>";
                              echo "<tr>";
              echo "<th class='tc'></th><th class='tc'></th><th class='tc'></th><th class='tc'></th>";
              echo "<th class='tc'></th><th class='tc'><a href='update.php?crid=".$rows["roomid"]."&money=".$monetary."&typeid=".$rows["typeid"]."&orderid=".$rows["orderid"]."'  class='link-update'>确认退房</a></th>";
              echo "<th class='tc'></th><th class='tc'></th><th class='tc'></th><th class='tc'></th>";
              echo "</tr>";
              }
            ?>
          </table>
        </div>
      </div>
    </div>
    <!--/main-->
</div>
</body>
</html>