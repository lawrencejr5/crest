<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check for the required fields without plan_description
    if (isset($_POST['plan_name'], $_POST['plan_rate'], $_POST['plan_min'], $_POST['plan_max'], $_POST['plan_type'], $_POST['duration'], $_POST['duration_text'])) {
        $plan_id      = uniqid("plan_"); // Generate a unique ID for the plan
        $plan_name    = $_POST['plan_name'];
        $plan_rate    = $_POST['plan_rate'];
        $plan_min     = $_POST['plan_min'];
        $plan_max     = $_POST['plan_max'];
        $plan_type    = $_POST['plan_type'];
        $duration     = $_POST['duration'];
        $duration_text = $_POST['duration_text'];

        $result = $modules->createPlan($plan_id, $plan_name, $plan_type, $plan_rate, $duration, $duration_text, $plan_min, $plan_max);
        if ($result) {
            echo json_encode([
                "status"  => "success",
                "message" => "Plan created successfully."
            ]);
        } else {
            echo json_encode([
                "status"  => "error",
                "message" => "Failed to create plan."
            ]);
        }
    } else {
        echo json_encode([
            "status"  => "error",
            "message" => "Required parameters are missing."
        ]);
    }
} else {
    echo json_encode([
        "status"  => "error",
        "message" => "Invalid request method."
    ]);
}
