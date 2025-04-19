<?php
// This script should be triggered by a cron job or task scheduler

include '../module.php';
$modules = new Modules();

$currentDate = date('Y-m-d H:i:s');

// Select all active investments
$sql = "SELECT * FROM investments WHERE status = 'active'";
$stmt = $modules->conn->prepare($sql);
if ($stmt->execute()) {
    $activeInvestments = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($activeInvestments as $inv) {
        // Get plan details to determine profit frequency and duration
        $plan = $modules->getPlan($inv['plan_id']);
        if (!$plan) {
            continue;
        }

        // Check if the investment period has ended
        if (strtotime($currentDate) >= strtotime($inv['end_date'])) {
            // Investment period ended: update status to 'ended'
            $newStatus = 'ended';
            $newEarned = $inv['expected']; // Fully credit the expected profit
            // Set num_of_days to the plan duration
            $newNumOfDays = $plan['duration'];
        } else {
            // Still active: always increment the number of days invested
            $newNumOfDays = $inv['num_of_days'] + 1;
            $newStatus = 'active';

            // Determine if profit should be added today based on profit frequency
            $profitMethod = strtolower($plan['plan_type']); // Expected values: "daily", "weekly", etc.
            $addProfit = false;

            if ($profitMethod === 'daily') {
                $addProfit = true; // Add profit every day
            } elseif ($profitMethod === 'weekly') {
                // For example, add profit only on Monday (ISO-8601: Monday = 1)
                if (date('N') == 1) {
                    $addProfit = true;
                }
            }
            // Extend here for "monthly" or other frequency if needed

            if ($addProfit) {
                $newEarned = $inv['earned'] + $inv['to_earn'];
            } else {
                // Even if not adding profit, update the number of days invested
                $newEarned = $inv['earned'];
            }
        }

        // Update the investment record with the new earned amount, number of days, and status
        $modules->updateInvestmentProfit($inv['invest_id'], $newEarned, $newNumOfDays, $newStatus);
    }
}
