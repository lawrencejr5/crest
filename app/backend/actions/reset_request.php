<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../module.php"; // Your Modules class or DB connection
include "../mailer.php"; // Your Modules class or DB connection
$modules = new Modules();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = trim($_POST['email']);

    // Check if email exists in the database.
    $user = $modules->getUserByEmail($email); // You should implement getUserByEmail() in your Modules class.
    if ($user) {
        // Generate a secure token and expiry (for example, valid for one hour)
        $token = bin2hex(random_bytes(32));
        $expires = date("Y-m-d H:i:s", strtotime('+1 hour'));

        // Update user record with token and expiry in the database.
        // In your users table, add columns "reset_token" and "reset_expires".
        $modules->setPasswordResetToken($user['id'], $token, $expires); // Implement this accordingly.

        // Prepare the reset link:
        $resetLink = "<a href='" . ROOT . "/reset/reset_password.php?token=" . $token . "'> reset link</a>";

        // Send email to user:
        $subject = "Password Reset Request";
        $message = "Hello,\n\nPlease click the link below to reset your password:\n" . $resetLink . "\n\nThis link will expire in 1 hour.\n\nIf you did not request a password reset, please ignore this email.";
        $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Password Reset | " . NAME . "</title>
            </head>
            <body>
                <center>
                    <img src='" . ROOT . "/assets/images/logoIcon/crest2-nobg.png' height='auto' width='200px' />
                    <h1>Dear $fname, </h1>
               </center>
               <p>$message</p>
               <p>You can <a href='" . ROOT . "/login'>login</a> to perform more actions on your account.</p>
               <br/>
               <br/>
               <p>Please, if this is not you, kindly let us know so that we can terminate this process.</p>
                <center>
                    <a href='" . ROOT . "/links/terms-amp-condition/181'>Terms and condtions</a> | 
                    <a href='" . ROOT . "/links/privacy-amp-policy/180'>Terms and condtions</a> | 
               </center>
            </body>
        </html>
    ";
        $mailer->sendMyMail($email, $fname, $subject, $message);


        echo json_encode([
            'status' => 'success',
            'message' => 'If this email exists in our system, a reset link has been sent.'
        ]);
    } else {
        // Do not reveal if email exists.
        echo json_encode([
            'status' => 'success',
            'message' => 'If this email exists in our system, a reset link has been sent.'
        ]);
    }
    exit;
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request.'
    ]);
}
