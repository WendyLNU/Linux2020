<?php 
	foreach ($_COOKIE as $key => $value)
 	{
 		setcookie($key,"",time()-1);
 	}
	sleep(2);//留时间删除cookie
	echo "<script>{alert('注销成功');location.href='default.php';} </script>";
//header("Location:index_access.php");//这是PHP的重新定向的一般方法
?>
