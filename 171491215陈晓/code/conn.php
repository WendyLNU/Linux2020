<?php
$db = @mysql_connect('localhost','root','123456') or die("�뱾�ض�Mysql����������ʧ��");
@mysql_query("set names 'gb2312'",$db);//�������ݴ���
@mysql_select_db('news',$db) or die("������ʧ��");
?>
