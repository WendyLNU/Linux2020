<?php
{
	if(empty($_COOKIE["adname"]) || empty($_COOKIE["adname"]))
	{	echo "<script>{alert('�����Ƿ������¼��');location.href='default.php';} </script>";
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
		{echo "<script>{alert('�����Ƿ�����������ȷ�û���/������е�¼��');location.href='default.php';} </script>";
			exit();}
	}
}
?>
