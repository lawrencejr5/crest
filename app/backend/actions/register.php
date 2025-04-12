<?php

header('Content-Type: application/json');

include "../module.php";

if (isset($_POST["fname"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $phone = $_POST["phone"];
    $country = $_POST["country"];
    $otp = rand(100000, 999999); // Generate a random OTP
    $ref = isset($_POST["ref"]) ? $_POST["ref"] : null;
    $data = [];

    // Generate a unique user ID
    $user_id = uniqid("user_");

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Call the register method and store the result
    $result = $modules->register($user_id, $fname, $lname, $email, $hashed_password, $phone, $country, $otp, $ref);

    // Check the result and respond accordingly
    if ($result == "success") {
        $data["status"] = "success";
        $data["message"] = "Registration successful";
    } elseif ($result === "email_exists") {
        $data["status"] = "error";
        $data["message"] = "Email already exists";
    } else {
        $data["status"] = "error";
        $data["message"] = "Registration failed";
    }

    echo json_encode($data);
}
