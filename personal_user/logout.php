<?php
session_start();
unset($_SESSION['account']);
header('location:../web/index.html');
?>
