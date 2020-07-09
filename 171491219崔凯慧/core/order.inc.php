<?php 
header("Content-type: text/html; charset=utf-8");
function createOrder($docId,$timeFrame,$bookDate) {
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
	mysqli_query($link,"set names utf8;");  
	  
    $sql="select * from doctor where id = '$docId'";
    $rows = fetchOne($sql, $link);
	
    $docname = $rows['docname'];
    $docDepartment = $rows['department'];
    if (isset($_COOKIE['userName']) && isset($_COOKIE['userId'])) {
        $username = $_COOKIE['userName'];
        $userId = $_COOKIE['userId'];
        if ($timeFrame == 0) {
            $sql = "insert into hospital.order (docId,docname,docDepartment,userId,username,bookdate,timeFrame,cost,paystatue) values ('{$docId}','{$docname}','{$docDepartment}','{$userId}','{$username}','{$bookDate}','8:30-9:30','5','未缴费')";
        }elseif ($timeFrame == 1) {
            $sql = "insert into hospital.order (docId,docname,docDepartment,userId,username,bookdate,timeFrame,cost,paystatue) values ('{$docId}','{$docname}','{$docDepartment}','{$userId}','{$username}','{$bookDate}','9:30-10:30','5','未缴费')";
        }elseif ($timeFrame == 2) {
            $sql = "insert into hospital.order (docId,docname,docDepartment,userId,username,bookdate,timeFrame,cost,paystatue) values ('{$docId}','{$docname}','{$docDepartment}','{$userId}','{$username}','{$bookDate}','14:30-15:30','5','未缴费')";
        }elseif ($timeFrame == 3) {
            $sql = "insert into hospital.order (docId,docname,docDepartment,userId,username,bookdate,timeFrame,cost,paystatue) values ('{$docId}','{$docname}','{$docDepartment}','{$userId}','{$username}','{$bookDate}','15:30-16:30','5','未缴费')";
        }
		
        mysqli_query($link, $sql);
        alertBack("预约成功！");
    }else {
        alertMes("请先登录", "index.php");
    }   
}
function createmOrder($mId) {
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
	mysqli_query($link,"set names utf8;");  
	  
    $sql="select * from medical where id = '$mId'";
    $rows = fetchOne($sql, $link);
	
    $mname = $rows['mname'];
    $Date = date("Y-m-d H:i:s");
    if (isset($_COOKIE['userName']) && isset($_COOKIE['userId'])) {
        $username = $_COOKIE['userName'];
        $userId = $_COOKIE['userId'];
       
            $sql = "insert into hospital.morder (mid,mname,userId,username,buytime,paystatue) values ('{$mId}','{$mname}','{$userId}','{$username}','{$Date}','未缴费')";
		
        mysqli_query($link, $sql);
        alertBack("购买成功！");
    }else {
        alertMes("请先登录", "index.php");
    }   
}

function deleteOrder($orderId){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
	mysqli_query($link,"set names utf8;");  
    if (delete('hospital.order', "id='$orderId'",$link)){
        alertBack("操作成功!");
    }else{
        alertBack("操作失败!");
    }
}

function payOrder($orderId){
    $link=mysqli_connect(HOST,USERNAME,PASSWORD,DB);
	mysqli_query($link,"set names utf8;");  
    $arr['paystatue'] = "已缴费";
    if (update('hospital.order', $arr,"id='$orderId'",$link)){
        alertBack("操作成功!");
    }else{
        alertBack("操作失败!");
    }
}
?>