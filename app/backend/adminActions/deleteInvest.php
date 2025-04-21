<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['invest_id'])) {
        $invest_id = $_POST['invest_id'];
        $result = $modules->deleteInvestment($invest_id);
        if ($result) {
            echo json_encode([
                "status" => "success",
                "message" => "Investment deleted successfully."
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to delete investment."
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
