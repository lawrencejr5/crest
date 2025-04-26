<?php
session_start();
header('Content-Type: application/json');

include "../module.php";


if (isset($_POST['amount'])) {
    $invest_id    = $_POST['invest_id'];
    $amount    = $_POST['amount'];
    $dol_val   = $_POST['dol_val'];
    $currency  = $_POST['currency'];
    $type      = $_POST['type'];
    $address   = $_POST['address'];
    $transac_id = uniqid("cinv_");

    // Retrieve user id from session; ensure that your login script sets $_SESSION['user_id']
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    if (!$user_id) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'User not logged in'
        ]);
        exit();
    }
    // Attempt to create a deposit record for the user
    $result = $modules->makeDeposit($user_id, $transac_id, $amount, $dol_val, $currency, $type, $address);
    if ($result) {
        if ($modules->resetInterestWallet($invest_id)) {
            // Output success for user deposit
            echo json_encode([
                'status'  => 'success',
                'message' => 'Investement returns claimed'
            ]);
        }
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
