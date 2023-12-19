<?php
require_once __DIR__ . '/../database/Connect.php';

if (!empty($_POST['Email']) && !empty($_POST['TaskId'])) {
    $email = $_POST['Email'];
    $taskId = $_POST['TaskId'];

    $connection = new Connect();
    $con = $connection->dbConn();

    if ($con) {
        $sql = "SELECT * FROM users WHERE Email = ?";
        $stmt = mysqli_prepare($con, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $res = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($res) != 0) {
            $row = mysqli_fetch_assoc($res);
            $userId = $row['UserId'];

            $sql = "SELECT * FROM task_submits WHERE UserId = ? AND TaskId = ?";
            $stmt = mysqli_prepare($con, $sql);
            mysqli_stmt_bind_param($stmt, "ii", $userId, $taskId);
            mysqli_stmt_execute($stmt);
            $res = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($res) != 0) {
                $row = mysqli_fetch_assoc($res);
                $answers = $row['Answers'];

                if (!empty($answers) && $answers != ' ') {
                    $result = array(
                        "status" => "Success",
                        "data" => array(
                            "Answers" => $answers
                        )
                    );
                } else {
                    $result = array("status" => "Failed", "message" => "Answers is empty");
                }
            } else {
                $result = array("status" => "Failed", "message" => "No submission found for this user and task");
            }
        } else {
            $result = array("status" => "Failed", "message" => "Unauthorized access");
        }
    } else {
        $result = array("status" => "Failed", "message" => "Database connection failed");
    }
} else {
    $result = array("status" => "Failed", "message" => "All fields are required");
}

echo json_encode($result, JSON_PRETTY_PRINT);
?>