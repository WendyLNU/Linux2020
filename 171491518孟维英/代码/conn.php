<?php
$db = new com("adodb.connection");
$dir = "date/university_mark.mdb";

$cnstr="Driver={Microsoft Access Driver (*.mdb)};Uid=;Pwd=;DBQ=".realpath($dir);

$db->open($cnstr);//调用com类的open方法来执行上述连接驱动
?>