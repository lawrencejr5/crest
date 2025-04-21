<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['plan_id'])) {
        $plan_id = $_POST['plan_id'];
        $result = $modules->deletePlan($plan_id);
        if ($result) {
            echo json_encode([
                "status"  => "success",
                "message" => "Plan deleted successfully."
            ]);
        } else {
            echo json_encode([
                "status"  => "error",
                "message" => "Failed to delete plan."
            ]);
        }
    } else {
        echo json_encode([
            "status"  => "error",
            "message" => "Plan ID is missing."
        ]);
    }
} else {
    echo json_encode([
        "status"  => "error",
        "message" => "Invalid request method."
    ]);
}
