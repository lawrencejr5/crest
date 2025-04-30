<?php
session_start();
header('Content-Type: application/json');

// Include your Modules class. Adjust the path as needed.
include "../module.php";
$modules = new Modules();

// Check if temporary user data exists. (Set in login.php when 2FA is required.)
if (!isset($_SESSION['temp_user'])) {
    echo json_encode([
        'status'  => 'error',
        'message' => 'Session expired. Please login again.'
    ]);
    exit;
}

// Check if the OTP code was provided.
if (!isset($_POST['code'])) {
    echo json_encode([
        'status'  => 'error',
        'message' => 'OTP code is required.'
    ]);
    exit;
}

$code = $_POST['code'];
$tempUser = $_SESSION['temp_user'];
$user_id = $tempUser['id'];

// Verify the OTP code using your Modules method.
if ($modules->verify2FACode($user_id, $code)) {
    // OTP valid: complete login by storing user data in session.
    foreach ($tempUser as $key => $value) {
        $_SESSION[$key] = $value;
    }
    // Unset temporary data.
    unset($_SESSION['temp_user']);
    echo json_encode([
        'status'  => 'success',
        'message' => 'Login successful with 2FA.'
    ]);
    exit;
} else {
    echo json_encode([
        'status'  => 'error',
        'message' => 'Invalid OTP provided.'
    ]);
    exit;
}
