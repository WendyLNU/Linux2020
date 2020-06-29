<?php
$db=new com("adodb.connection");
$dir="data/laji.mdb";
$cnstr="Driver={Microsoft Access Driver (*.mdb)};Uid=;Pwd=;DBQ=".realpath($dir);
$db->open($cnstr);
?>



