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
    <?php
      require("../dbconnect.php");
      $sql="select a.roomid,b.typeid,b.typename,a.location,a.status,a.remarks from room a,roomtype b where a.typeid=b.typeid and a.roomid=".$_GET["mid"];
      $arr=mysqli_query($db_link,$sql);
      $rows=mysqli_fetch_row($arr);
    ?>
    <div class="main-wrap">
      <div class="crumb-wrap">
        <div class="crumb-list"><i class="icon-font"></i><a href="admin_index.php">后台管理</a><span class="crumb-step">&gt;</span><span class="crumb-name">房间管理</span></div>
      </div>
      <div class="result-wrap">
        <form id="myform" name="myform" method="post" action="update.php?mrid=<?php echo $rows[0] ?>">
          <table width="100%" height="173" border="0" align="center" cellpadding="2" cellspacing="1" class="result-tab">
            <tr>
              <td width="%15" align="right" class="td_bg">房间编号：</td>
              <td width="%85" class="td_bg"> <input name="roomid" type="text" id="roomid" value="<?php echo $rows[0] ?>" size="30" maxlength="50" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg">房间类型：</td>
              <td class="td_bg">
                <select name="typeid">
                  <option value="<?php echo $rows[1] ?>" selected><?php echo $rows[2] ?></option>
                <?php
                  require("../dbconnect.php");
                  $sql="select typeid,typename from roomtype";
                  $arr=mysqli_query($db_link,$sql);
                  if(!$arr)
                  {
                    echo "<option value=0>无房间类型</option>";
                    exit;
                  }
                  while($rr=mysqli_fetch_assoc($arr))
                  {
                    echo "<option value=".$rr["typeid"].">".$rr["typename"]."</option>";
                  }
                ?>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right" class="td_bg">房间位置：</td>
              <td class="td_bg">
                <select name="location">
                  <option value="<?php echo $rows[3] ?>" selected><?php echo $rows[3] ?></option>
                  <option value="1楼东侧">1楼东侧</option>
                  <option value="1楼中间">1楼中间</option>
                  <option value="1楼西侧">1楼西侧</option>
                  <option value="2楼东侧">2楼东侧</option>
                  <option value="2楼中间">2楼中间</option>
                  <option value="2楼西侧">2楼西侧</option>
                  <option value="3楼东侧">3楼东侧</option>
                  <option value="3楼中间">3楼中间</option>
                  <option value="3楼西侧">3楼西侧</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right" class="td_bg">房间状态：</td>
              <td class="td_bg">
                <select name="status">
                  <option value="<?php echo $rows[4] ?>" selected><?php if ($rows[4]='否') { echo "未入住";} else {echo "已入住";}  ?></option>
                  <option value="否" selected>未入住</option>
                  <option value="是">已入住</option>
                </select>
              </td>
            </tr>
            <tr>
              <td align="right" class="td_bg">房间描述：</td>
              <td class="td_bg"><input name="remarks" type="text" id="remarks" value="<?php echo $rows[5] ?>" size="10" maxlength="15" /></td>
            </tr>
            <tr>
              <td align="right" class="td_bg"><input type="reset" name="submit2" id="button2" value="重置" /></td>
              <td class="td_bg">
                <input type="hidden" name="action" value="roomchg">
                <input type="submit" name="submit" id="button" value="提交" />
              </td>
            </tr>
          </table>
        </form>
      </div>
    </div>
    <!--/main-->
  </div>
</body>
</html>