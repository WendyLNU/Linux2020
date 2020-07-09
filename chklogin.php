<?php session_start();
if(!$_SESSION['login'])
{	echo "<script>alert('您还没登陆！');</script>";
	echo "<script>parent.location.href='login.php'</script>";
	exit;	
}

?>
