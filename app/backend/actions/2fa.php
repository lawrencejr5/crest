<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
header('Content-Type: application/json');

include "../module.php";  // Loads Modules class
$modules = new Modules();

if (!isset($_SESSION['id'])) {
    echo json_encode([
        'status' => 'error',
        'message' => 'User not logged in.'
    ]);
    exit;
}

$user_id = $_SESSION['id'];

if (isset($_POST['action']) && isset($_POST['code'])) {
    $action = $_POST['action'];
    $code   = $_POST['code'];

    if ($action === 'enable') {
        // Optionally wrap in try-catch to capture any exceptions.
        try {
            $result = $modules->enable2FA($user_id, $code);
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Exception: ' . $e->getMessage()
            ]);
            exit;
        }

        if ($result) {
            echo json_encode([
                'status' => 'success',
                'message' => '2FA has been enabled.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid OTP code provided.'
            ]);
        }
    } elseif ($action === 'disable') {
        try {
            $result = $modules->disable2FA($user_id, $code);
        } catch (Exception $e) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Exception: ' . $e->getMessage()
            ]);
            exit;
        }
        if ($result) {
            echo json_encode([
                'status' => 'success',
                'message' => '2FA has been disabled.'
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid OTP code provided.'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Invalid action.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request.'
    ]);
}
