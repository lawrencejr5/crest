<?php
session_start();

include "../module.php";
header('Content-Type: application/json');

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // Call the login method from your Modules class
    $user = $modules->getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {
        // Password is correct – login success
        $result = $user;
    } else {
        $result = false;
    }

    $response = [];
    if ($result === false) {
        $response['status']  = "error";
        $response['message'] = "Invalid credentials";
    } elseif (is_array($result)) {
        // Loop over the returned user data and store them in separate session variables
        foreach ($result as $key => $value) {
            $_SESSION[$key] = $value;
        }
        $response['status']  = "success";
        $response['message'] = "Login successful";
    } else {
        $response['status']  = "error";
        $response['message'] = "User not verified";
    }

    echo json_encode($response);
} else {
    echo json_encode([
        'status'  => "error",
        'message' => "Invalid request"
    ]);
}
