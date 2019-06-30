<?php
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/DbConnector.php';
include_once '../models/Task.php';

$dbConnector = new DbConnector();
$connection = $dbConnector->getConnection();

$task = new Task($connection);

$stmt = $task->read();
$count = $stmt->rowCount();

if ($count > 0) {

    $tasks = array();
    $tasks["body"] = array();
    $tasks["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        extract($row);
        $p = array(
            "id" => $id,
            "description" => "$description",
            "status" => "$status"
        );

        array_push($tasks["body"], $p);
    }
    http_response_code(200);
    echo json_encode($tasks);
} else {
    http_response_code(404);
    echo json_encode(
        array("body" => array(), "count" => 0)
    );
}
