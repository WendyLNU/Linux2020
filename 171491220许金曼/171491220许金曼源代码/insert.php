<?php
  require("dbconnect.php");
  
  //下订单
  if($_POST["action"]=="inserto")
  {
    //在customer表中插入一条记录
    $sql1 = "insert into customer (cardid,cardtype,cname,csex) values('".$_POST["cardid"]."','".$_POST["cardtype"]."','".$_POST["cname"]."','".$_POST["csex"]."')";
    //echo $sql1;
    mysqli_query($db_link,$sql1) or die ("在customer表中插入记录失败：".mysqli_error());
    
    //在orders表中插入一条记录
    $sql2 = "insert into orders (roomid,cardid,entertime,leavetime,typeid,linkman,phone,ostatus,oremarks) values('".$_POST["roomid"]."','".$_POST["cardid"]."','".$_POST["entertime"]."','".$_POST["leavetime"]."','".$_POST["typeid"]."','".$_POST["cname"]."','".$_POST["phone"]."','是','否')";
    //echo $sql2;
    mysqli_query($db_link,$sql2) or die ("在orders表中插入记录失败：".mysqli_error());

    //更新roomtype表中leftunm字段
    $sql3 = "update roomtype set leftnum=leftnum-1 where typeid=".$_POST["typeid"];
    //echo $sql3;
    mysqli_query($db_link,$sql3) or die ("更新roomtype表中leftunm字段失败：".mysqli_error());
  
    echo "<script language=javascript>alert('在线预订成功');window.location='online_reserve.php'</script>";
  }
?>
