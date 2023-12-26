<?php 
session_start();
require_once __DIR__ . '/../database/Connect.php';

if (isset($_POST['otp']) && !empty($_POST['otp'])) {
    $enteredOtp = array_map('trim', $_POST['otp']); // krn satu2 jd oke array

    $connect = new Connect();
    $connection = $connect->dbConn();

    try {
        // $sql = "SELECT * FROM verifications WHERE otp = ?";
        // $stmt->bind_param("i", $enteredOtp[0]); 

        $sql = "SELECT * FROM verifications WHERE otp = CONCAT (?, ?, ?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("iiiiii", $enteredOtp[0], $enteredOtp[1], $enteredOtp[2], $enteredOtp[3], $enteredOtp[4], $enteredOtp[5]);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            echo "$stmt->num_rows <br>"; 
            $_SESSION['otp'] = $enteredOtp;
            header("Location: ../pages/resetPassword.php");
            exit();
        } else {
            echo '<script>alert("Kode OTP tidak valid.");</script>';
            // header("Location: ../pages/ForgotPass.php");
            // exit();
        }
    } catch (Exception $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    } finally {
        if (isset($stmt)) {
            $stmt->close();
        }
        if ($connection) {
            $connection->close();
        }
    }
} else {
    echo '<script>alert("Tidak valid.");</script>';
    // header("Location: ../pages/ForgotPass.php");
    // exit();
}
?>
