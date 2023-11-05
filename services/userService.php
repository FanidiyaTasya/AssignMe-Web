<?php
require_once __DIR__ . '/../database/Connect.php';

if (isset($_GET['function'])) {
    if (function_exists($_GET['function'])) {
        $_GET['function']();
    }
}

function getUsers() {
    $method = $_SERVER['REQUEST_METHOD'];

    $Connect = new Connect();
    $connection = $Connect->dbConn();
    
    $query = $connection->query("SELECT * FROM users");
    while ($row = mysqli_fetch_object($query)) { 
        $data[] = $row;
    }
    $response = array();

    if ($method == 'GET' && $data) {
        $response['Status'] = [
            "status" => 1,
            "message" => 'Request Valid',
        ];

        $response['Users'] = $data; 
    } else {
        $response['Status'] = [
            "status" => 0,
            "message" => 'Request Not Valid',
        ];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

function getUsersId() {
    $method = $_SERVER['REQUEST_METHOD'];

    $Connect = new Connect();
    $connection = $Connect->dbConn();

    if (!empty($_GET["id"])) {
        $id = $_GET["id"];
    }

    $query = $connection->query("SELECT * FROM users WHERE UserId = $id");
    while ($row = mysqli_fetch_object($query)) { 
        $data[] = $row;
    }
    $response = array();

    if ($method == 'GET' && $data) {
        $response['Status'] = [
            "status" => 1,
            "message" => 'Request Valid',
        ];

        $response['Users'] = $data; 
    } else {
        $response['Status'] = [
            "status" => 0,
            "message" => 'Request Not Valid',
        ];
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}

