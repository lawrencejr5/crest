<?php
session_start();
include 'module.php';

$user = [];
$uID = isset($_SESSION['id']) ? $_SESSION['id'] : null;
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
$admin = isset($_SESSION['admin']) ? $_SESSION['admin'] : null;

$user = [];
if ($uID) {
    $userData = $modules->getUserData($uID);
    if ($userData && is_array($userData)) {
        $user = $userData;
    }
}

// Rowcount data
$total_users = $modules->getRowCount('users');
$total_investments = $modules->getRowCount('investments');
$total_tickets = $modules->getRowCount('tickets');

// Total transactions = deposits count + withdrawals count (if still needed)
$total_deposits_count = $modules->getRowCount('deposits');
$total_withdrawals_count = $modules->getRowCount('withdrawals');
$total_transactions = $total_deposits_count + $total_withdrawals_count;

// Active Investments (assuming status = 'active')
$active_investments = $modules->getRowCount('investments', 'status = "active"');

// Open Tickets (assuming tickets that are not closed have status different than "closed")
$open_tickets = $modules->getRowCount('tickets', 'status <> "closed"');

// Total deposit and withdrawal amounts (summing the 'dol_val' column)
$total_deposits_amount = $modules->getTotal('deposits', 'dol_val');
$total_withdrawals_amount = $modules->getTotal('withdrawals', 'dol_val');


$all_users = $modules->getAllUsers();
$all_transactions = $modules->getAllTransactions();

(!$_SESSION['admin'] || $_SESSION['admin'] == "false") && header('location: ../dashboard/');
