<?php
session_start();
header("Content-Type:text/html; charset=utf-8");

require_once(dirname(__FILE__) . "/config.php");
$account = $_SESSION['account'];
$facility_place = $_POST['place'];
$facility_date_time_str = strtotime($_POST['date'].' '.$_POST['time'].':00');
$facility_date_time = date('Y-m-d H:i:s',$facility_date_time_str);
$facility_hours = $_POST['hours'];
$facility_device = $_POST['device'];

$sql = "SELECT rID,mtime FROM management_fee WHERE rID='$account'";
$result = mysqli_query($link,$sql);//執行指令

if (mysqli_num_rows($result)){
	$row = mysqli_fetch_row($result);
	foreach($facility_device as $device ){
		
        $sql = "INSERT INTO using_record VALUES('$facility_date_time',$facility_hours,'$account','$facility_place','$row[1]','$device')";//指令
        echo $sql;
        $result = mysqli_query($link,$sql);//執行指令

	}
}
else{
	echo '未繳管理費!!';
}
mysqli_close($link);//最後要關起來
//header('location:facility.php');
?>