<?php

header('Content-Type: application/json');

include "../module.php";
include "../mailer.php";

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

    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Email Verification | Crest-Asset Trading</title>
            </head>
            <body>
                <center>
                    <img src='/crest/assets/images/logoIcon/crest2-nobg.png' height='auto' width='200px' />
                    <h1>Verify your email</h1>
                    <p>Do not share this code with any body</p>
               </center>
               <p>Email: $email</p>
               <p>Verification Code: $otp</p>
               <br/>
               <br/>
               <p>Please, if this is not you, kindly reply this email saying it's not you so that we can terminate this registration.</p>
               <center>
                    <a href='https://yfincs.com/t&c'>Terms and condtions</a> | 
                    <a href='https://yfincs.com/policy'>Privacy Policy</a>
               </center>
            </body>
        </html>
    ";

    // Generate a unique user ID
    $user_id = uniqid("user_");

    // Hash the password before storing it
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // Call the register method and store the result
    $result = $modules->register($user_id, $fname, $lname, $email, $hashed_password, $phone, $country, $otp, $ref);

    // Check the result and respond accordingly
    if ($result == "success") {
        $bonus_transac_id = uniqid("bon_");
        $modules->makeDeposit($user_id, $bonus_transac_id, 2, 2, "USD", "signup bonus", "N/A", "success");
        $mailer->sendMyMail($email, $fname, 'Verification Code', $body);
        $data["status"] = "success";
        $data["message"] = "An OTP was sent to your email address";
    } elseif ($result === "email_exists") {
        $data["status"] = "error";
        $data["message"] = "Email already exists";
    } else {
        $data["status"] = "error";
        $data["message"] = "Registration failed";
    }

    echo json_encode($data);
}
