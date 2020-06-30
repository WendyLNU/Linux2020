<?php
	require_once "admin/Mysql.class.php";
	$uName = $_POST['uName'];
	$uPass = $_POST['uPass'];
	$rePwd = $_POST['rePwd'];
	if($uPass == $rePwd){
		$sql = "select * from userinfo where uName = '$uName' limit 1";
		$checkArr = $db->selectOne($sql);
		if(empty($checkArr['uName'])){
			$arr['uName'] = $uName;
			$arr['uPass'] = md5($uPass);
			$db->insert("userinfo",$arr);
			$db->msg("注册成功");
			$db->href("login.php");
		}
		else{
			$db->msg("用户名已存在");
			$db->history();
		}
	}else{
		$db->msg("两次密码须一致");
		$db->history();
	}
?>