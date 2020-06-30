<?php
	require_once "Mysql.class.php";
	$id = $_GET['id'];
	$db->delete("music","Id = $id");
	$db->href("music.php");
?>