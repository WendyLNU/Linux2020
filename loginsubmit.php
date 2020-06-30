<?php
session_start();
	require_once "admin/Mysql.class.php";
	$uName = $_POST['uName'];
	$Pwd   = $_POST['Pwd'];
	$sql = "select * from userinfo where uName = '$uName' limit 1";
	$arr = $db->selectOne($sql);
	if(empty($arr['uPass'])){
		$db->msg("账号不存在");
		$db->history();
	}else{
		if($arr['uPass'] == md5($Pwd)){
			if($uName == 'admin'){
				$_SESSION['admin'] = 1;
				$_SESSION['login'] = 1;
				$_SESSION['userID'] = $arr['uId'];
				$_SESSION['uName']=$uName;
				$db->href("index.php");
			}else{
				$_SESSION['login'] = 1;
				$_SESSION['userID'] = $arr['uId'];
				$_SESSION['uName']=$uName;
				$db->href("index.php");
			}
		}else{
			$db->msg("密码错误");
			$db->history();
		}
	}
?>