<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>成绩查询</title>
<link href="css.css" rel="stylesheet" type="text/css">
</head>

<body background="image/下载.jpg">
<table width="600" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td width="294" align="center">课程名字</td>
    <td width="89" align="center">学分</td>
    <td width="105" align="center">分数</td>
    <td width="158" align="center">考试时间</td>
    <td width="132" align="center">类型</td>
  </tr>
<?php include("conn.php");
$key=$_POST["kkk"];
$sql = "Select * From my_university_mark where course_name like '%{$key}%'";
$rs=new com("adodb.recordset");
$rs->open($sql,$db,1,1);//执行语句,返回记录集
while(! $rs->eof)
{
?>
  <tr>
    <td align="center"><?php echo $rs->Fields("course_name")->value; ?></td>
    <td align="center"><?php echo $rs->Fields("course_mark")->value; ?></td>
    <td align="center"><?php echo $rs->Fields("course_score")->value; ?></td>
    <td align="center"><?php echo $rs->Fields("course_time")->value; ?></td>
    <td align="center"><?php echo $rs->Fields("course_type")->value; ?></td>
  </tr>
<?php
 echo  $rs->MoveNext(); 
} ?>
</table>

</body>
</html>
