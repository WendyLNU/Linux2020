<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php 
	include("connect.php");
	mysql_query("SET NAMES GB2312");
	session_start();
	?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>�޸�����</title>
</head>

<body background="timg.jpg" style="background-size:cover;">
<center>
<font color="#FFFFFF" size="8"><strong><?php echo $_SESSION["username"];?>��ã���������޸��������</strong></font>
<br/>
<br/>
<br/>
<form action="" method="post" name="form1" onSubmit="return pswd();">
	<font color="#FFFFFF" >
		<strong>
			����������
		</strong>
	</font> 
	<input name="m1" type="text" />
	<br/>
	<br/
	<br/>
	<font color="#FFFFFF">
		<strong>
			���ٴ�ȷ��
		</strong> 
	<input name="m2" type="text" />
	<br/>
	<br/>
	<br/>
	<input name="submit" type="submit" value="�ύ"   />
</form>
</center>


</body>
</html>

<script language="javascript">
	function pswd(){
		mm1=document.form1.m1.value;
		mm2=document.form1.m2.value;
		if(mm1.length==0||mm2.length==0){
			alert("���벻��Ϊ��");
			return false;
			}
		if(mm1!=mm2){
				alert("������������벻һ��");
				return false;
			}
		}
</script>


	<?php
		if(isset($_POST['submit'])){
			$newpd=$_POST["m1"];
			if($_SESSION["class"]=="s"){
				$result = mysql_query("update student set spd={$newpd} where sid={$_SESSION["id"]}");
				if($result)
					echo "<script>{alert('�ɹ�');history.back();}</script>";
				else 
					echo "<script>{alert('�޸�ʧ��');history.back();} </script>";
			 
			}
			if($_SESSION["class"]=="t"){
				$result = mysql_query("update teacher set tpd={$newpd} where tid={$_SESSION["id"]}");
				if($result)
					echo "<script>{alert('�ɹ�');history.back();}</script>";
	  			else 
					echo "<script>{alert('�޸�ʧ��');history.back();} </script>";
	 
			}
		}
	?>

