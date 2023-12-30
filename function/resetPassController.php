<?php
session_start();
require_once __DIR__ . '/../database/Connect.php';

$connect = new Connect();
$connection = $connect->dbConn();

try {
    if (isset($_SESSION['otp']) && isset($_POST['password']) && isset($_POST['confirmPass'])) {
        $otp = $_SESSION['otp'];
        $password = $_POST['password'];
        $confirmPass = $_POST['confirmPass'];

        // var_dump($otp, $password);

        $sql = "UPDATE users SET `Password` = ? WHERE UserId = (SELECT UserId FROM verifications WHERE otp = ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("si", $password, $otp);
        $stmt->execute();
        $stmt->close();
        // var_dump($stmt->execute()); 
        // var_dump($stmt->affected_rows);

        if ($stmt) {
            header("Location: ../pages/Login.php");
            exit();
        } else {
            echo "Gagal mereset password";
        }
    }
} catch (Exception $e) {
    error_log("An error occurred: " . $e->getMessage());
}
?>
