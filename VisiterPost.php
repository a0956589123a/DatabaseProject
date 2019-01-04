<?php
// mb_internal_encoding('utf-8');
// set_time_limit(0);
// date_default_timezone_set("Asia/Taipei");#取得台灣時間


// $db_host = 'localhost';
// $db_user = 'toby';
// $db_pass = 'toby1489';
// $db_name = 'communitymanagement';//需設置

// $link = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die('無法建立連結:'.mysqli_connect_error());//首先先建立連線
// mysqli_select_db($link, $db_name)or die('無法開啟 product 資料庫:'.mysqli_error($link));//開啟這一個db
// mysqli_query($link,"SET NAMES UTF8");
require_once("Link.php");

// $Name= $_POST['Name'];
// $ID=$_POST['ID'];
// $Prove=$_POST['Prove'];
// $Enter=$_POST['EnterTime'];
// $Leave=$_POST['LeaveTime'];
	
$name = mysqli_real_escape_string($link, $_POST['Name']);
$id=mysqli_real_escape_string($link, $_POST['ID']);
$prove=mysqli_real_escape_string($link, $_POST['Prove']);
$enter=mysqli_real_escape_string($link, $_POST['EnterTime']);
$leave=mysqli_real_escape_string($link,$_POST['LeaveTime']);

$query="INSERT INTO Visiter(Name,ID,Prove,EnterTime,LeaveTime)VALUES('$name','$id','$prove','$enter','$leave')";
mysqli_query($link,$query);
header("location:Visiter.php");
?>
