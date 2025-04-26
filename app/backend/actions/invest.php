<?php
session_start();
header('Content-Type: application/json');

include '../module.php';

if (isset($_POST['plan_id'], $_POST['amount'])) {

    // Retrieve necessary parameters
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    $plan_id = $_POST['plan_id'];
    $amount  = $_POST['amount'];
    $num_of_days = 0;
    $expected;

    if (!$user_id) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'User not logged in'
        ]);
        exit();
    }

    // Get the plan details
    $plan = $modules->getPlan($plan_id);
    if (!$plan) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Invalid plan selected'
        ]);
        exit();
    }

    // Retrieve duration from the plan (number of days, int)
    $duration = $plan['duration'];

    // Set start_date as now and calculate end_date
    $start_date = date('Y-m-d H:i:s');
    $end_date = date('Y-m-d H:i:s', strtotime("+{$duration} days", strtotime($start_date)));

    $earned = 0; // Initial earned amount is zero
    $expected = ($plan['plan_rate'] / 100) * $amount;  // Calculate expected earnings based on plan rate

    $daily_to_earn = $expected / $duration;
    $weekly_to_earn = ($expected / $duration) * 7;
    $to_earn = $plan['plan_type'] == "daily" ? $daily_to_earn : $weekly_to_earn; // Expected earnings per day, for example
    $status = 'active';

    // Generate a unique investment ID
    $invest_id = uniqid("invest_");

    // Start the investment
    $result = $modules->startInvestment($invest_id, $user_id, $plan_id, $amount, $start_date, $end_date, $to_earn, $earned, $expected, $num_of_days, $status);

    if ($result) {
        // Now create a corresponding withdrawal record to deduct the invested amount.
        // Generate a unique withdrawal transaction ID.
        $withdrawTransacId = uniqid("inv_");
        // Call makeWithdrawal with type "investment". The address field here can be a description.
        $withdraw_result = $modules->makeWithdrawal($user_id, $withdrawTransacId, $amount, $amount, "USD", "N/A", "investment", "success");

        if ($withdraw_result) {
            echo json_encode([
                'status'  => 'success',
                'message' => 'Investment started successfully'
            ]);
        } else {
            echo json_encode([
                'status'  => 'error',
                'message' => 'Investment started but failed to record withdrawal'
            ]);
        }
    } else {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Failed to start investment'
        ]);
    }
} else {
    echo json_encode([
        'status'  => 'error',
        'message' => 'Invalid request parameters'
    ]);
}
