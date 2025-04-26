<?php
session_start();
include "./module.php";


header('content-type: application/json');

$register = $modules->register("ify82739", "ify", "opu", "hfdfd", "hfhd", "99shja", "agsgs", 123456, null);
echo json_encode($register);

$user = $modules->getUserData($_SESSION['id']);
echo json_encode($user);



$data['all_investments'] = $modules->getAllInvestments();

foreach ($data['all_investments'] as $i) {
    $id = $i['id'];
    $earned = $i['earned'] + $i['to_earn'];
    $earnings  = ($i['earned']) + $i['available_withdrawal']; // phase 1
    $earnings2 = ($i['earned'] / 2) + $i['available_withdrawal']; // phase 2
    $earnings3 = ($i['earned'] / 3) + $i['available_withdrawal']; // phase 3
    $earnings4 = ($i['earned'] / 4) + $i['available_withdrawal']; // phase 4
    $earnings5 = ($i['earned'] / 5) + $i['available_withdrawal']; // phase 5
    $total     = $i['earned'] + $i['amount'] + $i['to_earn'];
    $status    = $i['status'];
    $last      = $i['last_updated']; // assumed to be a Unix timestamp
    $end       = $i['end_date'];
    $curr      = date('Y-m-d H:i:s'); // corrected: use H:i:s for hours, minutes, seconds
    $duration  = $i['durationInt'];
    $days      = $i['num_of_days'];
    $added_day = $days + 1;

    // Compare the last update day with the current day.
    $last_date    = date('Y-m-d', $last);
    $current_date = date('Y-m-d');

    if ($status == 'ended') {
        $modules->changeInvestStatus($id, 'ended');
    } elseif ($status == 'active') {
        // Perform daily operation if the day has changed.
        if ($last_date != $current_date) {
            // Check whether this is the final day of the investment.
            if ($days == $duration - 1) {
                $modules->investUp($id, $earned, time());
                $modules->investIncreaseDay($id, $added_day);
                $modules->changeInvestStatus($id, 'ended');
                $modules->investAvailableWithdraw($id, $total);
            } else {
                // Increase the investment values and day count.
                $modules->investUp($id, $earned, time());
                $modules->investIncreaseDay($id, $added_day);

                // Change phases and update available withdrawal based on the new day count.
                if ($added_day == 15) {
                    $modules->changeInvestPhase($id, 'second');
                    $modules->investAvailableWithdraw($id, $earnings);
                } elseif ($added_day == 30) {
                    $modules->changeInvestPhase($id, 'third');
                    $modules->investAvailableWithdraw($id, $earnings2);
                } elseif ($added_day == 45) {
                    $modules->changeInvestPhase($id, 'fourth');
                    $modules->investAvailableWithdraw($id, $earnings3);
                } elseif ($added_day == 60) {
                    $modules->changeInvestPhase($id, 'fifth');
                    $modules->investAvailableWithdraw($id, $earnings4);
                } elseif ($added_day == 75) {
                    $modules->changeInvestPhase($id, 'sixth');
                    $modules->investAvailableWithdraw($id, $earnings5);
                }
            }
        }
    }
}
