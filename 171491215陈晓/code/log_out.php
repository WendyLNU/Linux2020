<?php 
	foreach ($_COOKIE as $key => $value)
 	{
 		setcookie($key,"",time()-1);
 	}
	sleep(2);//��ʱ��ɾ��cookie
	echo "<script>{alert('ע���ɹ�');location.href='default.php';} </script>";
//header("Location:index_access.php");//����PHP�����¶����һ�㷽��
?>
