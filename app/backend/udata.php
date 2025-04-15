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

$total_withdrawals = 0;
if ($user_id) {
    $totalWithdrawals = $modules->getTotalWithdrawals($user_id);
    if ($totalWithdrawals) {
        $total_withdrawals = $totalWithdrawals;
    }
}

// Calculate total user balance
$total_user_balance = $total_deposits - $total_withdrawals;

// Get all transactions (both deposits and withdrawals) for the user
$all_transactions = [];
if ($user_id) {
    $allTransactions = $modules->getAllTransactions($user_id);
    if ($allTransactions && is_array($allTransactions)) {
        $all_transactions = $allTransactions;
    }
}

$last_transactions = [];
if (isset($all_transactions) && is_array($all_transactions)) {
    $last_transactions = array_slice($all_transactions, 0, 5);
}

!$_SESSION['id'] && header('location: ../../login');
