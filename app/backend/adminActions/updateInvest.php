<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['invest_id'])) {
        $invest_id = $_POST['invest_id'];

        // Build the update fields array from POST data, excluding reserved keys
        $reserved = ['invest_id', 'action'];
        $fields = [];
        foreach ($_POST as $key => $value) {
            if (in_array($key, $reserved)) {
                continue;
            }
            $fields[$key] = $value;
        }

        if (empty($fields)) {
            echo json_encode([
                "status" => "error",
                "message" => "No fields provided for update."
            ]);
            exit;
        }

        $result = $modules->updateInvestment($invest_id, $fields);
        if ($result) {
            echo json_encode([
                "status" => "success",
                "message" => "Investment updated successfully."
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to update the investment."
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Required parameter 'invest_id' is missing."
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method."
    ]);
}
