<?php
$db = new com("adodb.connection");
$dir = "date/university_mark.mdb";

$cnstr="Driver={Microsoft Access Driver (*.mdb)};Uid=;Pwd=;DBQ=".realpath($dir);

$db->open($cnstr);//����com���open������ִ��������������
?>