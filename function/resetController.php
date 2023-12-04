<?php
session_start();
require_once __DIR__ . '/../database/Connect.php';

// $conn = new mysqli("localhost", "root", "", "assignme");
// if ($conn->connect_error) {
//     die("Koneksi gagal: " . $conn->connect_error);
// }
$connect = new Connect();
$conn = $connect->dbConn();

$otp = $_SESSION['otp'];
$newPassword = $_POST['new_password'];
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
