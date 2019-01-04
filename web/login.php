<?php
	session_start();
	require_once("../Link.php");
	$user = $_POST["user"];
	$password = $_POST["password"];
	$sql = "Select RA From login Where username='$user'";
	$result = mysqli_query($link, $sql);
	if ($result == false) {
		echo "<script>alert('帳號不對')</script>";
		header("login.html");
	} else {
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		$ra = $row["RA"];
		if ($ra == 0) {
			$sql = "Select rID From resident Where rID = '$user' And password = '$password'";
			$result = mysqli_query($link, $sql);
			if ($result == false) {
				echo "<script>alert('密碼不對')</script>";
				header("login.html");
			} else {
				$_SESSION["account"] = $user;
				echo "$user";
				header("Location:../personal_user/personal_imfor.php");
			}
		} else {
			$sql = "Select username From admin Where username = '$user' And password = '$password'";
			$result = mysqli_query($link, $sql);
			if ($result == false) {
				echo "<script>alert('密碼不對')</script>";
				header("login.html");
			} else {
				$_SESSION["account"] = $user;
				echo "$user";
				header("Location:admin.html");
			}
		}
	}

?>