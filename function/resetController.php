<?php
session_start();
require_once __DIR__ . '/../database/Connect.php';

$connect = new Connect();
$connection = $connect->dbConn();

$otp = $_SESSION['otp'];
$newPassword = $_POST['new_password'];

try {
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    $sqlUpdatePassword = "UPDATE users SET Password = ? WHERE UserId = (SELECT UserId FROM verifications WHERE otp = ?)";
    $stmtUpdatePassword = $connection->prepare($sqlUpdatePassword);
    $stmtUpdatePassword->bind_param("ss", $hashedPassword, $otp);
    $stmtUpdatePassword->execute();
    $stmtUpdatePassword->close();

    $sqlDeleteVerification = "DELETE FROM verifications WHERE otp = ?";
    $stmtDeleteVerification = $connection->prepare($sqlDeleteVerification);
    $stmtDeleteVerification->bind_param("s", $otp);
    $stmtDeleteVerification->execute();
    $stmtDeleteVerification->close();

    if ($stmtUpdatePassword && $stmtDeleteVerification) {
        header("Location: ../pages/Login.php");
        exit();
    } else {
        echo '<script>alert("Gagal mereset kata sandi, silakan coba lagi.");</script>';
    }
} catch (Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
} finally {
    if ($connection) {
        $connection->close();
    }
}
?>
