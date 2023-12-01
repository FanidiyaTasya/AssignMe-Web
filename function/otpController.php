<?php
// verify_otp.php
require_once __DIR__ . ('/../database/Connect.php');

$otp = $_POST['otp'];

$conn = new mysqli("localhost", "root", "", "assignme");
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

try {
    // Menggunakan NOW() di MySQL untuk mendapatkan waktu dari server database
    $sql = "SELECT * FROM verifications WHERE otp = ? AND reset_password_expiry > NOW() - INTERVAL 5 MINUTE";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Simpan OTP di sesi untuk digunakan saat reset password
        session_start();
        $_SESSION['otp'] = $otp;
        
        header("Location: ../pages/resetpassword.php");
    } else {
        echo "Kode OTP tidak valid atau sudah kadaluwarsa.";
    }
} catch (Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
} finally {
    $stmt->close();
    $conn->close();
}
?>
