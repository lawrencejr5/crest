<?php
session_start();
header('Content-Type: application/json');
include "../module.php";

// Make sure required POST fields exist
if (isset($_POST['amount'], $_POST['dol_val'], $_POST['currency'], $_POST['type'], $_POST['address'])) {
    $amount   = $_POST['amount'];
    $dol_val  = $_POST['dol_val'];
    $currency = $_POST['currency'];
    $type     = $_POST['type'];
    $address  = $_POST['address'];
    $transac_id = uniqid("wid_");

    // Retrieve user id from session - ensure your login script sets this
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    if (!$user_id) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'User not logged in'
        ]);
        exit();
    }

    // Check available balance
    $available = $modules->getAvailableDepositBalance($user_id);
    if ($dol_val > $available) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Insufficient funds in your deposit wallet.'
        ]);
        exit();
    }

    // If your business logic is to deduct "little by little",
    // you might process a fraction of the withdrawal now and schedule the remainder.
    // For simplicity, we assume the requested amount is processed now.
    $result = $modules->makeWithdrawal($user_id, $transac_id, $amount, $dol_val, $currency, $address, $type);
    if ($result) {
        echo json_encode([
            'status'  => 'success',
            'message' => 'Withdrawal request initiated successfully'
        ]);
    } else {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Withdrawal request failed'
        ]);
    }
} else {
    echo json_encode([
        'status'  => 'error',
        'message' => 'Invalid request parameters'
    ]);
}
