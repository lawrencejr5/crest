<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['plan_id'])) {
        $plan_id = $_POST['plan_id'];
        // Build fields array; add any updatable fields
        $fields = [];
        if (isset($_POST['plan_name']))       $fields['plan_name']       = $_POST['plan_name'];
        if (isset($_POST['plan_rate']))       $fields['plan_rate']       = $_POST['plan_rate'];
        if (isset($_POST['plan_min']))        $fields['plan_min']        = $_POST['plan_min'];
        if (isset($_POST['plan_max']))        $fields['plan_max']        = $_POST['plan_max'];
        if (isset($_POST['plan_type']))        $fields['plan_type']        = $_POST['plan_type'];
        if (isset($_POST['duration']))        $fields['duration']        = $_POST['duration'];
        if (isset($_POST['duration_text']))        $fields['duration_text']        = $_POST['duration_text'];

        if (empty($fields)) {
            echo json_encode([
                "status"  => "error",
                "message" => "No fields provided to update."
            ]);
            exit;
        }

        $result = $modules->updatePlan($plan_id, $fields);
        if ($result) {
            echo json_encode([
                "status"  => "success",
                "message" => "Plan updated successfully."
            ]);
        } else {
            echo json_encode([
                "status"  => "error",
                "message" => "Failed to update plan."
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
