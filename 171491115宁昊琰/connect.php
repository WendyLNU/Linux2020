<?php
header("Content-type:text/html;charset=gb2312");
$db = mysql_connect('localhost','root','123456') or die("�뱾�ض�Mysql����������ʧ��");
mysql_query("set names 'gb2312'",$db);//�������ݴ���
mysql_select_db('fruit',$db) or die("������ʧ��");
?>