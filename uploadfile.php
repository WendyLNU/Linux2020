<?php 
	session_start();
	include_once('conn.php');
	$id=$_SESSION['userID'];
	//获取用户信息
	printf("<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf8\">");
mysql_query("set character set 'utf8'");//读库 
mysql_query("set names 'utf8'");//写库 

	$sql ="select * from userinfo where uId=".$_SESSION['userID']."";
	
	$result=mysql_query($sql);
    $info_user=mysql_fetch_array($result);
	
	
	$tarGetPic = $_FILES["tarGetPic"]["name"];
	if($tarGetPic){
		if($_FILES["tarGetPic"]["size"] / 1024 <= 100){
			    if ($_FILES["tarGetPic"]["error"] > 0)
			    {
				echo "上传文件错误: " . $_FILES["tarGetPic"]["error"] . "<br />";
				}
				else
				{
				$str_Array = explode(".",$tarGetPic);
				$str_end = end($str_Array);
				move_uploaded_file($_FILES["tarGetPic"]["tmp_name"],"headimages/".$info_user['uName'].".$str_end");
				$sql = "update userinfo set Head = '".$info_user['uName'].".$str_end' where uId = ".$_SESSION['userID']."";
				mysql_query($sql);

				echo "<script>alert('图片上传成功！');parent.location.href = 'self.php?id='</script>";
				exit;
				}
			}
			else
			{
			echo "<script>alert('文件大小不超过100kb!');history.back();</script>";
			exit;
			}
		}
?>
