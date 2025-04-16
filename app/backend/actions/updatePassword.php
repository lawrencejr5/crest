<?php
header('Content-Type: application/json');
session_start();
include "../module.php";

// Make sure required parameters are sent
if (isset($_SESSION['user_id'], $_POST['old_password'], $_POST['new_password'])) {
    $user_id      = $_SESSION['id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];

    $modules = new Modules(); // Instantiate your Modules object

    // Retrieve user data (assuming getUserData returns user information including the password hash)
    $user = $modules->getUserData($user_id);
    if ($user) {
        // Verify the old password matches
        if (password_verify($old_password, $user['password'])) {
            // Update password if correct
            $result = $modules->updatePassword($user_id, $new_password);
            if ($result) {
                $data['status']  = "success";
                $data['message'] = "Password updated successfully.";
            } else {
                $data['status']  = "error";
                $data['message'] = "Failed to update password.";
            }
        } else {
            $data['status']  = "error";
            $data['message'] = "Old password is incorrect.";
        }
    } else {
        $data['status']  = "error";
        $data['message'] = "User not found.";
    }
} else {
    $data['status']  = "error";
    $data['message'] = "Missing required parameters.";
}

echo json_encode($data);
