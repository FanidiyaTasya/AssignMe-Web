<?php
require_once __DIR__ . '/../database/Connect.php';

$otp = $_POST['otp'];

$connect = new Connect();
$connection = $connect->dbConn();

try {
    $sql = "SELECT * FROM verifications WHERE otp = ? AND reset_password_expiry > NOW() - INTERVAL 5 MINUTE";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $otp);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['otp'] = $otp;

        header("Location: ../pages/resetpassword.php");
        exit(); // Pastikan untuk keluar setelah mengarahkan pengguna
    } else {
        echo '<script>alert("Kode tidak valid atau telah kadaluarsa.");</script>';
    }
} catch (Exception $e) {
    echo "Terjadi kesalahan: " . $e->getMessage();
} finally {
    // Pastikan untuk menutup statement dan koneksi di blok finally
    if (isset($stmt)) {
        $stmt->close();
    }
    if ($connection) {
        $connection->close();
    }
}
?>
