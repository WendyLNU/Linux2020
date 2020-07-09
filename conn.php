<?php
$conn = @mysql_connect('localhost','root','123456') or die("与本地端Mysql服务器连接失败");
@mysql_query("set names 'utf-8'");//设置数据代码
@mysql_select_db('db') or die("与连接失败");
?>