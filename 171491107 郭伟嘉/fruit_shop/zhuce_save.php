
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
		echo "<script>{alert('���˺��ѱ�ע�ᣡ����');history.back();} </script>";
		exit();}
	}
$sql1="insert into customer (name,sex,address,tel,mm) values ('$xingming','$xingbie','$dizhi','$dianhua','mm')";
//echo $sql;exit();
//$result=mysql_query($sql);
//$result�ǲ����ͱ�����������ֵ������ʾ��ɾ���Ƿ�ɹ���

if(mysql_query($sql1))
    echo "<script>{alert('��ӳɹ�');location.href='first.php'} </script>";
else 
    echo "<script>{alert('���ʧ��');history.back();} </script>";
?>
