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
        // Add a $2.00 bonus deposit for the new user
        $bonus_transac_id = uniqid("bon_");
        // $modules->makeDeposit( $user_id, $transac_id, $amount, $dol_val, $currency, $type, $address)
        // Assuming currency "USD", type "registration_bonus" and a dummy address value
        $modules->makeDeposit($user_id, $bonus_transac_id, 2, 2, "USD", "signup bonus", "N/A");

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
