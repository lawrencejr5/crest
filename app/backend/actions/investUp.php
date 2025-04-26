<?php

include "../module.php";


$all_investments = $modules->getAllInvestments();
$current_date = date('Y-m-d');

foreach ($all_investments as $i) {
    $id = $i['invest_id'];
    $status = $i['status'];
    $to_earn = $i['to_earn'];
    $earned = $i['earned'];
    $new_earned = $i['earned'] + $to_earn;
    $num_of_days = $i['num_of_days'];
    $new_num_of_days = $num_of_days + 1;
    $new_status = $i['status'];
    $end_date = date("Y-m-d", strtotime($i['end_date']));
    $last_updated = $i['last_updated'];

    $plan = $modules->getPlan($i['plan_id']);

    $plan_duration = $plan['duration'];
    $plan_type = $plan['plan_type'];


    if ($status == 'active' && $last_updated !== $current_date) {
        if ($plan_type == "daily") {
            if ($new_num_of_days == $plan_duration) {
                $modules->updateInvestmentProfit($id, $new_earned, $new_num_of_days, "ended", $current_date);
            } else {
                $modules->updateInvestmentProfit($id, $new_earned, $new_num_of_days, "active", $current_date);
            }
        } else if ($plan_type == "weekly") {
            if ($new_num_of_days == $plan_duration) {
                $modules->updateInvestmentProfit($id, $new_earned, $new_num_of_days, "ended", $current_date);
            } else {
                if (($new_num_of_days % 7) == 0) {
                    $modules->updateInvestmentProfit($id, $new_earned, $new_num_of_days, "active", $current_date);
                } else {
                    $modules->updateInvestmentProfit($id, $earned, $new_num_of_days, "active", $current_date);
                }
            }
        } else {
            return;
        }
    }
}
