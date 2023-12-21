<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/../database/Connect.php';
require_once __DIR__ . '/../vendor/autoload.php';

function sendOTP($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'riovas1212@gmail.com';     
        $mail->Password   = 'tqttkrvcryptdeer';
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        $mail->setFrom('riovas1212@gmail.com', 'Assignme');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Verifikasi Kode OTP';
        $mail->Body    = "Kode OTP Anda adalah: $otp";

        $mail->send();

        echo 'Kode OTP telah dikirim ke email Anda.';
    } catch (Exception $e) {
        echo "Gagal mengirim email: {$mail->ErrorInfo}";
    }
}

function generateOTP() {
    $otpLength = 6;
    $characters = '0123456789';
    $otp = '';

    for ($i = 0; $i < $otpLength; $i++) {
        $otp .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $otp;
}

$email = $_POST['email'];

$connect = new Connect();
$connection = $connect->dbConn();

$userResult = $connection->query("SELECT UserId FROM users WHERE email = '$email'");

if ($userResult->num_rows > 0) {
    $otp = generateOTP();
    $expirationTime = date('Y-m-d H:i:s', strtotime('+5 minutes'));

    sendOTP($email, $otp);

    $sql = "INSERT INTO verifications (UserId, otp, reset_password_expiry) VALUES ((SELECT UserId FROM users WHERE email = '$email'), '$otp', NOW() + INTERVAL 5 MINUTE)";
    $connection->query($sql);

    echo '<script>alert("Email registered. Please check your inbox for the OTP.");</script>';
    header("Location: ../pages/OTP.php");
    exit();
} else {
    echo '<script>alert("Email not registered.");</script>';
}

$connection->close();
?>
