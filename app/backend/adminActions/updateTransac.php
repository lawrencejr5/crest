<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['trans_type'], $_POST['trans_id'])) {
        $trans_type = $_POST['trans_type'];
        $trans_id = $_POST['trans_id'];

        // Build the update fields array from POST data,
        // excluding reserved keys
        $reserved = ['trans_type', 'trans_id', 'action'];
        $fields = [];
        foreach ($_POST as $key => $value) {
            if (in_array($key, $reserved)) {
                continue;
            }
            $fields[$key] = $value;
        }

        if (empty($fields)) {
            echo json_encode(["status" => "error", "message" => "No fields provided for update."]);
            exit;
        }

        $result = $modules->updateTransaction($trans_type, $trans_id, $fields);
        if ($result) {
            echo json_encode(["status" => "success", "message" => "Transaction updated successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update transaction."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Required parameters missing."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
