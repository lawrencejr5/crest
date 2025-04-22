<?php
session_start();
header('Content-Type: application/json');

include "../module.php";

// Check that required POST parameters are present
if (isset($_POST['user_id'], $_POST['amount'], $_POST['dol_val'], $_POST['currency'], $_POST['type'], $_POST['address'])) {
    $user_id    = $_POST['user_id'];
    $amount    = $_POST['amount'];
    $dol_val   = $_POST['dol_val'];
    $currency  = $_POST['currency'];
    $type      = $_POST['type'];
    $address   = $_POST['address'];
    $transac_id = uniqid("dep_");

    // Attempt to create a deposit record for the user
    $result = $modules->makeDeposit($user_id, $transac_id, $amount, $dol_val, $currency, $type, $address, $status = 'success',);
    if ($result) {
        // Output success for user deposit
        echo json_encode([
            'status'  => 'success',
            'message' => 'Deposit initiated successfully'
        ]);
    } else {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Failed to initiate deposit'
        ]);
    }
} else {
    echo json_encode([
        'status'  => 'error',
        'message' => 'Invalid request parameters'
    ]);
}
