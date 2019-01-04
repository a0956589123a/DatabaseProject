<?php

session_start();

header("Content-Type:text/html; charset=utf-8");

require_once(dirname(__FILE__) . "/config.php");

$account = $_SESSION['account'];//$_COOKIE['account'];
//$sql = "SELECT * FROM management_fee";
$sql = "SELECT distinct * FROM resident NATURAL JOIN management_fee WHERE resident.rID='".$account."'";//指令
$result = mysqli_query($link,$sql);//執行指令

if (mysqli_num_rows($result)){
    $row = mysqli_fetch_row($result);
    if($row[9]>0){
    	$load_infor = array('preview_progressbarTW_img'=>$row[7],'static_account'=>$row[0],'InputPassword1'=>$row[1],'InputPassword2'=>$row[1],'name'=>$row[2],'gender'=>$row[3],'phone'=>$row[4],'Email'=>$row[5],'Parking-grid'=>$row[6],'static_management_fee'=>'yes');
        echo json_encode($load_infor);
    }
    else{
    	$load_infor = array('preview_progressbarTW_img'=>$row[7],'static_account'=>$row[0],'InputPassword1'=>$row[1],'InputPassword2'=>$row[1],'name'=>$row[2],'gender'=>$row[3],'phone'=>$row[4],'Email'=>$row[5],'Parking-grid'=>$row[6],'static_management_fee'=>'no');
        echo json_encode($load_infor);
    }
}
else{
	echo 'load error!';
}
mysqli_close($link);//最後要關起來
?>