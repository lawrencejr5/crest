<?php

session_start();

include 'module.php';

$data = [];
$uID = $_SESSION['id'];



// User info
$data['user'] = $modules->getUserData($uID);
foreach ($data['user'] as $u) {
    $fname = $u['fname'];
    $lname = $u['lname'];
}


// Other data
$data['wallets'] = $modules->getAllWallets();
$data['user_wallets'] = $modules->getAllUserWallets($uID);


// Row counts
$numOfInvestments = $modules->numOfUserInvestments($uID);
