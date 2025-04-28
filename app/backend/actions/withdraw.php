<?php
session_start();
header('Content-Type: application/json');
include "../module.php";
include "../mailer.php";

// Make sure required POST fields exist
if (isset($_POST['amount'], $_POST['dol_val'], $_POST['currency'], $_POST['type'], $_POST['address'])) {
    $amount   = $_POST['amount'];
    $dol_val  = $_POST['dol_val'];
    $currency = $_POST['currency'];
    $type     = $_POST['type'];
    $address  = $_POST['address'];
    $transac_id = uniqid("wid_");
    $email = $_SESSION['email'];
    $fname = $_SESSION['fname'];

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Withdrawal | " . NAME . "</title>
            </head>
            <body>
                <center>
                    <img src='" . ROOT . "/assets/images/logoIcon/crest2-nobg.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>We wish to inform you that you have made a withdrawal request of <b>$amount USD</b>, address: <b>$address</b>.</p>
               <p>We would get back to you within the next 24 hrs and we would inform you when this withdrawal has been approved and you have been credited. Thank you.</p>
               <p>You can <a href='" . ROOT . "/login'>login</a> to perform more actions on your account.</p>
               <br/>
               <br/>
               <p>Please, if this is not you, kindly let us know so that we can terminate this process.</p>
                <center>
                    <a href='" . ROOT . "/links/terms-amp-condition/181'>Terms and condtions</a> | 
                    <a href='" . ROOT . "/links/privacy-amp-policy/180'>Terms and condtions</a> | 
               </center>
            </body>
        </html>
    ";

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
        $mailer->sendMyMail($email, $fname, 'Withdrawal request', $body);

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
