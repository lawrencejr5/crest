<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['trans_type'], $_POST['trans_id'])) {
        $trans_type = $_POST['trans_type'];
        $trans_id = $_POST['trans_id'];

        $result = $modules->deleteTransaction($trans_type, $trans_id);
        if ($result) {
            echo json_encode(["status" => "success", "message" => "Transaction deleted successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to delete transaction."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Required parameters missing."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
