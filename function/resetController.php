<?php
// reset_password.php
require_once __DIR__ . '/../database/Connect.php';

$newPassword = $_POST['new_password'];

$conn = new mysqli("localhost", "root", "", "assignme");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil OTP dari sesi
session_start();
$otp = $_SESSION['otp'];

try {
    $sqlUpdatePassword = "UPDATE users SET Password = ? WHERE UserId = (SELECT UserId FROM verifications WHERE otp = ?)";
    $stmtUpdatePassword = $conn->prepare($sqlUpdatePassword);
    $stmtUpdatePassword->bind_param("ss", $newPassword, $otp);
    $stmtUpdatePassword->execute();
    $stmtUpdatePassword->close();

    $sqlDeleteVerification = "DELETE FROM verifications WHERE otp = ?";
    $stmtDeleteVerification = $conn->prepare($sqlDeleteVerification);
    $stmtDeleteVerification->bind_param("s", $otp);
    $stmtDeleteVerification->execute();
    $stmtDeleteVerification->close();

    if ($stmtUpdatePassword && $stmtDeleteVerification) {
        header("Location: ../pages/Login.php");
        exit();
    } else {
        echo '<script>alert("Password reset failed, please try again.");</script>';
    }

} catch (Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
}

$conn->close();
?>
