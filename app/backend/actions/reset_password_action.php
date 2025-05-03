<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

include "../module.php";
$modules = new Modules();

// Validate token in URL
if (!isset($_GET['token'])) {
    echo json_encode([
        'status'  => 'error',
        'message' => 'Invalid password reset link.'
    ]);
    exit;
}

$token = $_GET['token'];

// Fetch the user by token (implement getUserByResetToken() in your Modules class)
$user = $modules->getUserByResetToken($token);
if (!$user) {
    echo json_encode([
        'status'  => 'error',
        'message' => 'Invalid or expired token.'
    ]);
    exit;
}

// Check if token has expired (assuming reset_expires is stored in the user record)
if (strtotime($user['reset_expires']) < time()) {
    echo json_encode([
        'status'  => 'error',
        'message' => 'This reset link has expired.'
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_password'])) {
    $newPassword     = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if ($newPassword !== $confirmPassword) {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Passwords do not match.'
        ]);
        exit;
    }


    // Update the user record with the new password.
    $result = $modules->updatePassword($user['id'], $newPassword);
    if ($result) {
        // Optionally clear the reset token fields.
        $modules->clearResetToken($user['id']);
        echo json_encode([
            'status'  => 'success',
            'message' => 'Password has been reset successfully.'
        ]);
        exit;
    } else {
        echo json_encode([
            'status'  => 'error',
            'message' => 'Failed to update password. Please try again.'
        ]);
        exit;
    }
} else {
    echo json_encode([
        'status'  => 'error',
        'message' => 'Invalid request.'
    ]);
    exit;
}
