<?php
// Mulai sesi
session_start();

// Hapus semua variabel sesi
$_SESSION = array();

// Hancurkan sesi
session_destroy();

// Redirect ke halaman login atau halaman lain yang diinginkan setelah logout
header("Location: ../Pages/login.php"); // Gantilah "path/to/login.php" dengan path yang benar ke halaman login Anda
exit();
?>
