<?php
session_start();
header('Content-Type: application/json');

include "../module.php";

// Check that required POST parameters are present
if (isset($_POST['amount'], $_POST['dol_val'], $_POST['currency'], $_POST['type'], $_POST['address'])) {
    $amount   = $_POST['amount'];
    $dol_val   = $_POST['dol_val'];
    $currency = $_POST['currency'];
    $type     = $_POST['type'];
    $address  = $_POST['address'];

    // Retrieve user id from session; ensure that your login script sets $_SESSION['id']
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    if (!$user_id) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'User not logged in'
        ]);
        exit();
    }

    // Attempt to create a deposit record
    $result = $modules->makeDeposit($user_id, $amount, $dol_val, $currency, $type, $address);
    if ($result) {
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
