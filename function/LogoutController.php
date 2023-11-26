<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location: ../pages/Login.php"); 
exit();
?>
