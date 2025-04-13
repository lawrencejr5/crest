<?php
session_start();
include 'module.php';


$user = [];
$uID = isset($_SESSION['id']) ? $_SESSION['id'] : null;
// $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;


if ($uID) {
    $userData = $modules->getUserData($uID);
    if ($userData && is_array($userData)) {
        $user = $userData;
    }
}

// $user_deposits = [];
// if ($user_id) {
//     $userDeposits = $modules->getUserDeposits($user_id);
//     if ($userDeposits && is_array($userDeposits)) {
//         $user_deposits = $userDeposits;
//     }
// }

!$_SESSION['id'] && header('location: ../../login');
