<?php 
session_start();
require_once __DIR__ . '/../database/Connect.php';

if (isset($_POST['otp']) && !empty($_POST['otp'])) {
    // krn jd array otpnya, trs di gabungkan jd string
    $otpString = implode("", $_POST['otp']);

    $connect = new Connect();
    $connection = $connect->dbConn();

    try {
        $sql = "SELECT * FROM verifications WHERE otp = ?";
        // $sql = "SELECT * FROM verifications WHERE otp = CONCAT (?, ?, ?, ?, ?, ?)";
        // $stmt->bind_param("iiiiii", $otp[0], $otp[1], $otp[2], $otp[3], $otp[4], $otp[5]);
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("s", $otpString);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $_SESSION['otp'] = $otpString; // variabelnya samain

            header("Location: ../pages/resetPassword.php");
            exit();
        } else {
            echo '<script>alert("Kode OTP tidak valid.");</script>';
            // header("Location: ../pages/otp.php");
            // exit();
        }
    } catch (Exception $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    } 

} else {
    echo '<script>alert("Tidak valid.");</script>';
    // header("Location: ../pages/ForgotPass.php");
    // exit();
}
?>
