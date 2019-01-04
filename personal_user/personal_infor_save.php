<?php


header("Content-Type:text/html; charset=utf-8");

require_once(dirname(__FILE__) . "/config.php");


$account = $_POST['static_account'];
$password = $_POST['InputPassword1'];
$name = $_POST['name'];
$gender = $_POST['gender'];

$phonenumber = $_POST['phone'];
$Email = $_POST['Email'];
$Parking_grid = $_POST['Parking-grid'];
//$static_management_fee = $_POST['static_management_fee'];

$sql = "UPDATE resident SET resident.password='$password',resident.name='$name',resident.gender='$gender',resident.phone='$phonenumber',resident.email='$Email',resident.parking='$Parking_grid' WHERE resident.rID='$account'";//尋找account將序列值修改的指令
$result = mysqli_query($link,$sql);//執行指令

mysqli_close($link);//最後要關起來
header('location:personal_imfor.php');
?>
