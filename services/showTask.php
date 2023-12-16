<?php
require_once __DIR__ . '/../database/Connect.php';

$response = array();
$connect = new Connect();
$con = $connect->dbConn();

if (isset($_POST['TaskId']) && !empty($_POST['TaskId'])) {
    $taskId = $_POST['TaskId'];
    $sql = "SELECT * FROM tasks WHERE TaskId = '$taskId'";
} elseif (isset($_POST['ClassId']) && !empty($_POST['ClassId'])) {
    $classId = $_POST['ClassId'];
    $sql = "SELECT * FROM tasks WHERE ClassId = '$classId'";
} else {
    $response['status'] = "error";
    $response['message'] = "TaskId or ClassId is required";
    echo json_encode($response, JSON_PRETTY_PRINT);
    exit;
}
$result = $con->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $response['tasks'] = array();

        while ($row = $result->fetch_assoc()) {
            $task = array(
                'taskId' => intval($row['TaskId']),
                'taskName' => $row['TaskName'],
                'taskDesc' => $row['TaskDesc'],
                'dueDate' => $row['DueDate'],
                'ClassId' => $row['ClassId'],
                'attachment' => $row['Attachment']
            );

            $response['tasks'][] = $task;
        }

        echo json_encode($response, JSON_PRETTY_PRINT);
    } else {
        $response['tasks'] = array();

        $response['status'] = "error";
        $response['message'] = "No tasks found for this query";

        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    $response['status'] = "error";
    $response['message'] = "Database error: " . mysqli_error($con);

    echo json_encode($response, JSON_PRETTY_PRINT);
}

mysqli_close($con);
?>