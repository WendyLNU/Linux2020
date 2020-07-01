<?php
$db = @mysql_connect('localhost','root','123456') or die("与本地端Mysql服务器连接失败");
@mysql_query("set names 'gb2312'",$db);//设置数据代码
@mysql_select_db('news',$db) or die("与连接失败");
?>
