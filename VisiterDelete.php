<?php

require_once("Link.php");


$id=mysqli_real_escape_string($link, $_POST['ID']);

$query="DELETE FROM Visiter WHERE ID='$id'";
mysqli_query($link,$query);
header("location:Visiter.php");
?>
