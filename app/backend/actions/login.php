<?php
session_start();
header('Content-Type: application/json');

include "../module.php";

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Fetch user by email
    $user = $modules->getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        // Check if user is verified and not blocked
        if ($user['verified'] != 1) {
            echo json_encode([
                'status'  => "error",
                'message' => "User not verified"
            ]);
            exit;
        }
        if ($user['status'] === "blocked") {
            echo json_encode([
                'status'  => "error",
                'message' => "Your account has been blocked"
            ]);
            exit;
        }

        // If 2FA is enabled, store user data in temp session and return status 2fa_required.
        if ($user['two_factor_enabled'] == 1) {
            $_SESSION['temp_user'] = $user;
            echo json_encode([
                'status'  => "2fa_required",
                'message' => "2FA is enabled. Please enter your OTP code."
            ]);
            exit;
        } else {
            // Otherwise, store user data in session and complete login.
            foreach ($user as $key => $value) {
                $_SESSION[$key] = $value;
            }
            echo json_encode([
                'status'  => "success",
                'message' => "Login successful"
            ]);
            exit;
        }
    } else {
        echo json_encode([
            'status'  => "error",
            'message' => "Invalid Credentials"
        ]);
        exit;
    }
} else {
    echo json_encode([
        'status'  => "error",
        'message' => "Invalid request"
    ]);
}
