<?php
// send_email.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/../database/Connect.php';
require '../vendor/autoload.php';

function sendOTP($email, $otp) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Ganti dengan alamat SMTP sesuai kebutuhan
        $mail->SMTPAuth   = true;
        $mail->Username   = 'riovas1212@gmail.com'; // Ganti dengan email dan password SMTP Anda
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

$conn = new mysqli("localhost", "root", "", "assignme");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$userResult = $conn->query("SELECT UserId FROM users WHERE email = '$email'");

if ($userResult->num_rows > 0) {
    $otp = generateOTP();

    // Set waktu kadaluarsa (5 menit dari sekarang)
    $expirationTime = date('Y-m-d H:i:s', strtotime('+5 minutes'));

    sendOTP($email, $otp);

    $sql = "INSERT INTO verifications (UserId, otp, reset_password_expiry) VALUES ((SELECT UserId FROM users WHERE email = '$email'), '$otp', NOW() + INTERVAL 5 MINUTE)";
    $conn->query($sql);

    // Arahkan pengguna ke halaman formulir input OTP
    header("Location: ../pages/otp.php");
    exit();
} else {
    echo "Email tidak terdaftar.";
}

$conn->close();
?>
