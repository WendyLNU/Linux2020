<?php
include_once("conn.php");
session_start();
printf("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\">");
mysql_query("set character set 'utf8'");//读库 
mysql_query("set names 'utf8'");//写库 

$id=$_GET['id'];
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>修改</title>
</head>

<body>

<?php 

include_once("chklogin.php");
$sql="select * from topic where topicId=$id";
$result=mysql_query($sql);
$info=mysql_fetch_array($result);


if(isset($_POST['submit']))
{
	
	
	include_once("chklogin.php");
	$content = $_POST['content'];

	//更新分数
	$sql2="update topic set topicContent ='$content' where topicId=$id";
	$result2=mysql_query($sql2);	

	if($result2){
			echo "<script>alert('修改成功！');location.href='self.php';</script>";
		}else{
			echo "<script>alert('修改失败！');</script>";
			}
		

}


?>
<form action="" method="post" name="form" id="form" >
<textarea  name="content" rows="15" maxlength="500" class="text"  style="width:300px;"><?php echo $info['topicContent']?></textarea>
 <input type="submit"  id="submit" name="submit" class="submit" value="修改" >
</form>
</body>
</html>