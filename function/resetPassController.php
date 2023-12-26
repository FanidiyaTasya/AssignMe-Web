<?php
session_start();
require_once __DIR__ . '/../database/Connect.php';

$connect = new Connect();
$connection = $connect->dbConn();

$otp = isset($_SESSION['otp']) ? $_SESSION['otp'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$confirmPassword = isset($_POST['confirmPass']) ? $_POST['confirmPass'] : null;

var_dump($otp, $password);

try {

    $sql = "UPDATE users SET `Password` = ? WHERE UserId IN (SELECT UserId FROM verifications WHERE otp = ?)";
    $stmtUpdatePassword = $connection->prepare($sql);
    $stmtUpdatePassword->bind_param("ss", $password, $otp);
    $stmtUpdatePassword->execute();
    $stmtUpdatePassword->close();

    // Jika berhasil, arahkan ke halaman login
    // header("Location: ../pages/Login.php");
    // exit();
} catch (\Throwable $th) {
    echo "An error occurred: " . $th->getMessage();
}
?>
