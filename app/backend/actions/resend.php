<?php

include '../module.php';
include '../mailer.php';

if (isset($_POST['resend_code'])) {
    $res = [];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $code = $_POST['resend_code'];

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
                <title>Email Verification | Crest-Asset Trading</title>
            </head>
            <body>
                <center>
                    <img src='/crest/assets/images/logoIcon/crest2-nobg.png' height='auto' width='200px' />
                    <h1>Verify your email</h1>
                    <p>Do not share this code with any body</p>
               </center>
               <p>Email: $email</p>
               <p>Verification Code: $code</p>
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
    if ($modules->checkEmailExists($email) == 0) {
        $res['header'] = "err";
    } else {
        if ($modules->updateVerifyCode($code, $email)) {
            $mailer->sendMyMail($email, $fname, 'Verification Code', $body);
            $res['header'] = "resent";
        }
    }


    echo json_encode($res);
}
