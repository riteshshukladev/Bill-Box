<?php

include '../db/db.php';
// header('Content-Type: application/json');



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $projectname = $_POST['projectname'];
    $username = $_POST['username'];
    $projectid = $_POST['projectid'];

    $sql = "DELETE FROM allproject WHERE projectid = ?";
    $stmt = $pdo->prepare($sql);
    $success = $stmt->execute([$projectid]);

    if ($success) {
        echo json_encode(["status" => "success", "message" => "Project deleted successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Project not found"]);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}