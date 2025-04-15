<?php
session_start();
include 'module.php';

$user = [];
$uID = isset($_SESSION['id']) ? $_SESSION['id'] : null;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($uID) {
    $userData = $modules->getUserData($uID);
    if ($userData && is_array($userData)) {
        $user = $userData;
    }
}

$user_deposits = [];
if ($user_id) {
    $userDeposits = $modules->getUserDeposits($user_id);
    if ($userDeposits && is_array($userDeposits)) {
        $user_deposits = $userDeposits;
    }
}

$total_deposits = 0;
if ($user_id) {
    $totalDeposits = $modules->getTotalDeposits($user_id);
    if ($totalDeposits) {
        $total_deposits = $totalDeposits;
    }
}

$user_withdrawals = [];
if ($user_id) {
    $userWithdrawals = $modules->getUserWithdrawals($user_id);
    if ($userWithdrawals && is_array($userWithdrawals)) {
        $user_withdrawals = $userWithdrawals;
    }
}

!$_SESSION['id'] && header('location: ../../login');
