<?php
{
	if(empty($_COOKIE["adname"]) || empty($_COOKIE["adname"]))
	{	echo "<script>{alert('操作非法，请登录！');location.href='default.php';} </script>";
		exit();
	}
	else
	{
		$xm=$_COOKIE["adname"];
		$ps=$_COOKIE["password"];
		$sql="select * from Admin where admin='$xm' AND password='$ps'";

		$result = mysql_query($sql,$db) OR die (mysql_error($db));
		$row = mysql_fetch_array($result);
		if($row)
		{	;
		}
		else
		{echo "<script>{alert('操作非法，请输入正确用户名/密码进行登录！');location.href='default.php';} </script>";
			exit();}
	}
}
?>
