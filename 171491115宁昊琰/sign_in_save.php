
<?php 
include("connect.php");
$xingming = $_POST["xm"];
$xingbie = $_POST["xb"];
$dizhi = $_POST["dz"];
$dianhua = $_POST["tel"];
$mima = $_POST["mm"];
$sql = "SELECT * FROM customer";
$result = mysql_query($sql,$db) OR die (mysql_error($db));
while($row = mysql_fetch_array($result)){
	if($dianhua==$row["tel"]){
		echo "<script>{alert('该账号已被注册！！！');history.back();} </script>";
		exit();}
	}
$sql1="insert into customer (name,sex,address,tel,mm) values ('$xingming','$xingbie','$dizhi','$dianhua','mm')";
//echo $sql;exit();
//$result=mysql_query($sql);
//$result是布尔型变量，根据其值，可提示增删改是否成功！

if(mysql_query($sql1))
    echo "<script>{alert('添加成功');location.href='first.php'} </script>";
else 
    echo "<script>{alert('添加失败');history.back();} </script>";
?>
