<?php
require_once __DIR__ . '/../database/Connect.php';

$result = array();
$connection = new Connect(); 
$con = $connection->dbConn(); 

if ($con) {
    $email = $_POST['Email'];

    $sqlUserId = "SELECT UserId FROM users WHERE Email = ?";
    $stmtUserId = mysqli_prepare($con, $sqlUserId);
    mysqli_stmt_bind_param($stmtUserId, "s", $email);
    mysqli_stmt_execute($stmtUserId);
    $resultUserId = mysqli_stmt_get_result($stmtUserId);
    if (mysqli_num_rows($resultUserId) > 0) {
        $row = mysqli_fetch_assoc($resultUserId);
        $userId = $row['UserId']; 

        $sql = "SELECT tasks.TaskId, tasks.ClassId, tasks.TaskName, tasks.TaskDesc, tasks.DueDate, tasks.Attachment
        FROM tasks
        LEFT JOIN task_submits ON tasks.TaskId = task_submits.TaskId
        JOIN user_classes ON user_classes.ClassId = tasks.ClassId
        WHERE user_classes.UserId = ? AND task_submits.SubmitId IS NULL AND tasks.DueDate > NOW();
        ";       
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "i", $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $userClasses = array();
            while ($row = mysqli_fetch_assoc($result)) {
                $userClasses[] = $row;
            }
            echo json_encode(array("userClasses" => $userClasses));
        } else {
            echo "0 results";
        }
    } else {
        echo "UserId not found for this Email";
    }
} else {
}

$con->close();
?>