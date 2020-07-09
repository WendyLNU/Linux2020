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
        <div class="crumb-list"><i class="icon-font"></i><a href="index.php">网站首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">在线预订</span></div>
      </div>
      <div class="search-wrap">
        <div class="search-content">
          <form action="online_reserve.php" method="post">
            <table class="search-tab">
              <tr>
                <th width="120">查询条件</th>
                <td>
                  <select name="search-type" id="">
                    <option value="typename" selected>单双人间</option>
                  </select>
                </td>
                <th width="70">关键字</th>
                <td><input class="common-text" placeholder="请输入查询条件" name="keywords" value="" id="" type="text"></td>
                <td><input class="btn btn-primary btn2" name="sub" value="查询空闲房间" type="submit"></td>
              </tr>
            </table>
          </form>
        </div>
      </div>
      <div class="result-wrap">
        <div class="result-content">
          <table class="result-tab" width="100%">
            <tr>
              <th class="tc">房间编号</th>
              <th class="tc">类型编号</th>
              <th class="tc">类型名称</th>
              <th class="tc">房间位置</th>
              <th class="tc">房间面积</th>
              <th class="tc">床位数量</th>
              <th class="tc">早餐</th>
              <th class="tc">网络</th>
              <th class="tc">电视</th>
              <th class="tc">浴室</th>
              <th class="tc">价格</th>
              <!--th class="tc">剩余数量</th-->
              <th class="tc">操&emsp;&emsp;作</th>
            </tr>
            <?php
              require("dbconnect.php");
              $pagesize=20;
              $sql = "select a.roomid,b.typeid,b.typename,a.location,b.area,b.bednum,b.hasFood,b.hasNet,b.hasTV,b.hasWC,b.price,b.leftnum from room a,roomtype b where a.typeid=b.typeid and a.status='否' and b.leftnum>0 and a.roomid not in (select roomid from orders where ostatus='是') and b.".@$_POST["search-type"]." like ('%".@$_POST["keywords"]."%')";
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
              $sql="select a.roomid,b.typeid,b.typename,a.location,b.area,b.bednum,b.hasFood,b.hasNet,b.hasTV,b.hasWC,b.price,b.leftnum from room a,roomtype b where a.typeid=b.typeid and a.status='否' and b.leftnum>0 and a.roomid not in (select roomid from orders where ostatus='是') and b.".@$_POST["search-type"]." like ('%".@$_POST["keywords"]."%') order by a.roomid desc limit $startno,$pagesize";
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
                echo "<th class='tc'>".$rows["roomid"]."</th>";
                echo "<th class='tc'>".$rows["typeid"]."</th>";
                echo "<th class='tc'>".$rows["typename"]."</th>";
                echo "<th class='tc'>".$rows["location"]."</th>";
                echo "<th class='tc'>".$rows["area"]."</th>";
                echo "<th class='tc'>".$rows["bednum"]."</th>";
                echo "<th class='tc'>".$rows["hasFood"]."</th>";
                echo "<th class='tc'>".$rows["hasNet"]."</th>";
                echo "<th class='tc'>".$rows["hasTV"]."</th>";
                echo "<th class='tc'>".$rows["hasWC"]."</th>";
                echo "<th class='tc'>".$rows["price"]."</th>";
                echo "<th class='tc'>";
                echo "<a href='online_order.php?orid=".$rows["roomid"]."'  class='link-update'>在线预订</a>";
                echo "</th>";
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

