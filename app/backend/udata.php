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

$user_referrals = [];
if ($user_id) {
    $userReferrals = $modules->getUserReferrals($user_id);
    if ($userReferrals && is_array($userReferrals)) {
        $user_referrals = $userReferrals;
    }
}

// Calculate total user balance
$total_user_balance = $total_deposits - $total_withdrawals;

// Get all transactions (both deposits and withdrawals) for the user
$all_transactions = [];
if ($user_id) {
    $allTransactions = $modules->getAllUserTransactions($user_id);
    if ($allTransactions && is_array($allTransactions)) {
        $all_transactions = $allTransactions;
    }
}

// Get referral bonus deposits for the user
$user_ref_bonus_deposits = [];
if ($user_id) {
    $refBonusDeposits = $modules->getRefBonusDeposits($user_id);
    if ($refBonusDeposits && is_array($refBonusDeposits)) {
        $user_ref_bonus_deposits = $refBonusDeposits;
    }
}

// Prepare last transactions if needed
$last_transactions = [];
if (isset($all_transactions) && is_array($all_transactions)) {
    $last_transactions = array_slice($all_transactions, 0, 5);
}

// Get all tickets for the user
$user_tickets = [];
if ($user_id) {
    $allUserTickets = $modules->getAllUserTickets($user_id);
    if ($allUserTickets && is_array($allUserTickets)) {
        $user_tickets = $allUserTickets;
    }
}

// Get all investment plans
$user_plans = [];
$allPlans = $modules->getAllPlans();
if ($allPlans && is_array($allPlans)) {
    $user_plans = $allPlans;
}

// Get all wallets
$wallets = [];
$allWallets = $modules->getAllWallets();
if ($allWallets && is_array($allWallets)) {
    $wallets = $allWallets;
}

// Get all investments for the user
$user_investments = [];
if ($user_id) {
    $allInvestments = $modules->getAllInvestments($user_id);
    if ($allInvestments && is_array($allInvestments)) {
        $user_investments = $allInvestments;
    }
}

!$_SESSION['id'] && header('location: ../../login');
