<?php
include_once("conn.php");
session_start();
printf("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\">");
mysql_query("set character set 'utf8'");//读库 
mysql_query("set names 'utf8'");//写库 

include_once("chklogin.php");
$id=$_GET['id'];

if($_SESSION['admin']==1)
{	
$sql = "delete from message where Id = $id";
// $sql = "delete from reply where replyId = $id";
		$result = mysql_query($sql);
		if($result){
		echo "<script>alert('删除成功！');location.href='admin.php';</script>";
		}
		else{
		echo "<script>alert('删除失败！');location.href='admin.php';</script>";
		
		}	



}
else
{
	// $sql = "delete from reply where replyId = $id";
	$sql = "delete from message where Id = $id";
		$result = mysql_query($sql);
		if($result){
		echo "<script>alert('删除成功！');location.href='self.php';</script>";
		}
		else{
		echo "<script>alert('删除失败！');location.href='self.php';</script>";
		
		}	


	
}



		
?>