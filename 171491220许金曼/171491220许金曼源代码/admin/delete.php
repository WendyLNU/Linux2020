<?php
  require("../dbconnect.php");
  if(@$_GET["rid"])
  {
    $sql="delete from roomtype where typeid=".$_GET["rid"];
    //echo $sql;
    $arry=mysqli_query($db_link,$sql);
    if($arry)
    {
      echo "<script> alert('删除成功');location='admin_rtypemgr.php';</script>";
    }
    else
      echo "删除失败";
  }
  
  if(@$_GET["mid"])
  {
    $sql="delete from room where roomid='".$_GET["mid"]."'";
    echo $sql;
    $arry=mysqli_query($db_link,$sql);
    if($arry)
    {
      echo "<script> alert('删除成功');location='admin_roommgr.php';</script>";
    }
    else
      echo "删除失败";
  }

?>
