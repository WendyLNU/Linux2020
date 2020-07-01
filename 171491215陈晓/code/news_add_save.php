<?php 
include("conn.php");
$bbtt=$_POST["bt"];
$zzzz=$_POST["zz"];
$lblb=$_POST["lb"];
$sjsj=$_POST["sj"];
$nrnr=$_POST["nr"];
$sql="insert into News(title,user,bigclassname,infotime,content,hits) values('$bbtt','$zzzz','$lblb','$sjsj','$nrnr',0)";
//echo $sql;exit();
$result = mysql_query($sql,$db) OR die (mysql_error($db));
//$result是布尔型变量，根据其值，可提示增删改是否成功！
if($result)
    echo "<script>{alert('添加成功');location.href='admin_newslist.php'} </script>";
else 
    echo "<script>{alert('添加失败');history.bal();} </script>";
//header("Location:index_access.php");//这是PHP的重新定向的一般方法
?>
