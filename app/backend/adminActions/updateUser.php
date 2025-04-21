<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];

        // Update user status branch
        if ($action === 'updateStatus') {
            if (isset($_POST['user_id'], $_POST['status'])) {
                $user_id = $_POST['user_id'];
                $status = $_POST['status'];
                $result = $modules->updateUserStatus($user_id, $status);
                if ($result) {
                    echo json_encode(["status" => "success", "message" => "User status updated successfully."]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Unable to update user status."]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "Missing parameters for status update."]);
            }
        }

        // Update user info branch
        else if ($action === 'updateInfo') {
            if (
                isset(
                    $_POST['user_id'],
                    $_POST['fname'],
                    $_POST['lname'],
                    $_POST['email'],
                    $_POST['phone'],
                    $_POST['country'],
                    $_POST['address'],
                    $_POST['zip'],
                    $_POST['city'],
                    $_POST['state'],
                    $_POST['pic']
                )
            ) {
                $user_id = $_POST['user_id'];
                $fname   = $_POST['fname'];
                $lname   = $_POST['lname'];
                $email   = $_POST['email'];
                $phone   = $_POST['phone'];
                $country = $_POST['country'];
                $address = $_POST['address'];
                $zip     = $_POST['zip'];
                $city    = $_POST['city'];
                $state   = $_POST['state'];
                $pic     = $_POST['pic'];

                $result = $modules->updateUserInfo($user_id, $fname, $lname, $email, $phone, $country, $address, $zip, $city, $state, $pic);
                if ($result) {
                    echo json_encode(["status" => "success", "message" => "User information updated successfully."]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Unable to update user information."]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "Missing parameters for info update."]);
            }
        } else {
            echo json_encode(["status" => "error", "message" => "Invalid action specified."]);
        }
    } else {
        echo json_encode(["status" => "error", "message" => "No action specified."]);
    }
} else {
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
}
