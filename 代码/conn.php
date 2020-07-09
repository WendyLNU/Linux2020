<?php

header("Content-Type:text/html;charset=utf-8");
$conn=mysqli_connect('localhost','root','root');
if(!$conn){echo 'wrong'.mysqli_error();exit();}

mysqli_select_db(mysqli ,bbs);

?>

