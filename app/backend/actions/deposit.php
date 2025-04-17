<?php
session_start();
header('Content-Type: application/json');

include "../module.php";

// Check that required POST parameters are present
if (isset($_POST['amount'], $_POST['dol_val'], $_POST['currency'], $_POST['type'], $_POST['address'])) {
    $amount    = $_POST['amount'];
    $dol_val   = $_POST['dol_val'];
    $currency  = $_POST['currency'];
    $type      = $_POST['type'];
    $address   = $_POST['address'];
    $transac_id = uniqid("dep_");

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
        // Output success for user deposit
        echo json_encode([
            'status'  => 'success',
            'message' => 'Deposit initiated successfully'
        ]);

        // Check if this user was referred by someone
        // Assuming a function getUserData($user_id) exists that returns user details including the "ref" field
        $uid = isset($_SESSION['id']) ? $_SESSION['id'] : null;
        if (!$uid) {
            echo json_encode([
                'status'  => 'error',
                'message' => 'User not logged in'
            ]);
            exit();
        }
        $user_details = $modules->getUserData($uid);
        if ($user_details && !empty($user_details['ref'])) {
            $referrer_id = $user_details['ref'];
            // Calculate bonus: 10% of the deposit (using dol_val)
            $bonus = $dol_val * 0.10;
            $ref_transac_id = uniqid("ref_", true);
            // Create a deposit record for the referrer with type "ref_bonus"
            $modules->makeDeposit($referrer_id, $ref_transac_id, $amount, $bonus, $currency, 'ref bonus', $address);
            // Optionally, you can log this bonus event.
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
