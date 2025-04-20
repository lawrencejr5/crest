<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['user_id'])) {
        $user_id = $_POST['user_id'];
        $result = $modules->deleteUser($user_id);
        if ($result) {
            echo json_encode(["status" => "success", "message" => "User deleted successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Unable to delete user."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "User ID not provided."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
