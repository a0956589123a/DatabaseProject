<?php
	session_start();
	require_once("../Link.php");
	$user = $_SESSION["account"];
	$name = $_POST["name"];
	$phone = $_POST["phone"];
	$line = $_POST["line"];
	$password = $_POST["password"];
	$sql = "Update admin Set name='$name', phone = '$phone', line = '$line', password = '$password' Where username = '$user'";
	mysqli_query($link, $sql);
	header("Location:self.php");
?>