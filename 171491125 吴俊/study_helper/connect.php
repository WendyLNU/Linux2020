<?php
//header("Content-type:text/html;charset=gb2312");
$con = mysql_connect('localhost','root','123456') or die("�뱾�ض�Mysql����������ʧ��");
mysql_query("set names 'gb2312'",$con);//�������ݴ���
mysql_select_db('study',$con) or die("������ʧ��");
header("Content-type:text/html;charset=gb2312");
?>