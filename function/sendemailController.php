<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require_once __DIR__ . '/../database/Connect.php';
require_once __DIR__ . '/../vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        $connect = new Connect();
        $connection = $connect->dbConn();

        $stmt = $connection->prepare("SELECT UserId FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $userId = $row['UserId'];

            function generateOTP() {
                $otpLength = 6;
                $characters = '0123456789';
                $otp = '';

                for ($i = 0; $i < $otpLength; $i++) {
                    $otp .= $characters[rand(0, strlen($characters) - 1)];
                }

                return $otp;
            }

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

                    if (!$mail->smtpConnect()) {
                        echo "Gagal terhubung ke server SMTP. Error: " . $mail->ErrorInfo;
                        return;
                    }
                    $mail->send();

                    echo '<script>alert("Kode OTP telah dikirim ke email Anda. Silakan cek inbox Anda untuk OTP.");</script>';
                } catch (Exception $e) {
                    echo "Gagal mengirim email: {$mail->ErrorInfo}";
                }
            }

            $otp = generateOTP();
            date_default_timezone_set('Asia/Jakarta');
            $createdPass = date('Y-m-d H:i:s', time());
            $expiryTime = time() + (1 * 60 * 60);
            $expiredDate =  date('Y-m-d H:i:s', $expiryTime);
            // $expiredDate = date('Y-m-d H:i:s', strtotime('+2 minutes'));

            sendOTP($email, $otp);

            $checkStmt = $connection->prepare("SELECT UserId FROM verifications WHERE UserId = ?");
            $checkStmt->bind_param("s", $userId);
            $checkStmt->execute();
            $checkResult = $checkStmt->get_result();

            if ($checkResult->num_rows > 0) {
                $updateStmt = $connection->prepare("UPDATE verifications SET otp = ?, reset_password_created_at = ?, reset_password_expiry = ? WHERE UserId = ?");
                $updateStmt->bind_param("ssss", $otp, $createdPass, $expiredDate, $userId);
                $updateStmt->execute();
            } else {
                $insertStmt = $connection->prepare("INSERT INTO verifications (UserId, otp, reset_password_created_at, reset_password_expiry) VALUES (?, ?, ?, ?)");
                $insertStmt->bind_param("ssss", $userId, $otp, $createdPass, $expiredDate);
                $insertStmt->execute();
            }
            echo '<script>alert("Email terdaftar. Silakan cek inbox Anda untuk OTP.");</script>';
            header("Location: ../pages/OTP.php");
            exit();
        } else {
            echo '<script>alert("Email tidak terdaftar.");</script>';
            header("Location: ../pages/ForgotPass.php");
            exit();
        }

        $stmt->close();
        $connection->close();
    } else {
        echo "Email tidak ditemukan.";
    }
} else {
    echo "Akses langsung ke skrip tidak diizinkan.";
}
?>