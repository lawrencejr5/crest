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


(!$_SESSION['admin'] || $_SESSION['admin'] == "false") && header('location: ../dashboard/');
