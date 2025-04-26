<?php

include '../module.php';
include '../mailer.php';
include '../constants.php';

if (isset($_POST['code'])) {
    $res = [];
    $email = $_POST['email'];
    $code = $_POST['code'];
    $fname = $_POST['fname'];

    if (!$fname) {
        $u = $modules->getUserByEmail($email);
        $fname = $u['fname'];
    } else {
        $fname = $_POST['fname'];
    }



    $body = "
        <!DOCTYPE html>
        <html>
            <head>
                <title>Welcome | " . NAME . "</title>
            </head>
            <body>
                <center>
                    <img src='" . ROOT . "/assets/images/logoIcon/crest2-nobg.png' height='auto' width='200px' />
                    <h1>You're welcome, $fname</h1>
               </center>
               <p>Your email $email has been verified and the " . NAME . " team officially welcomes you to our platform.</p>
               <p>You can get started by Loging in <a href='" . ROOT . "/login'>here</a>. </p>
               <br/>
               <br/>
               <p>Please, if this is not you, kindly reply this email saying it's not you so that we can terminate this account.</p>
                <center>
                    <a href='" . ROOT . "/links/terms-amp-condition/181'>Terms and condtions</a> | 
                    <a href='" . ROOT . "/links/privacy-amp-policy/180'>Terms and condtions</a> | 
               </center>
            </body>
        </html>
    ";

    if ($modules->checkEmailExists($email) == 0) {
        $res['header'] = 'err';
    } else if ($modules->checkVerifyCode($code, $email) == 0) {
        $res['header'] = 'wrong';
    } else {
        if ($modules->verifyEmail($email)) {
            $res['header'] = 'verified';
            $mailer->sendMyMail($email, $fname, 'Welcome to ' . NAME, $body);
        }
    }

    echo json_encode($res);
}
