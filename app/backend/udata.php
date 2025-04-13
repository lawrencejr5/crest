<?php
session_start();
include 'module.php';

$user = []; // Initialize the variable

$uID = isset($_SESSION['id']) ? $_SESSION['id'] : null;


if ($uID) {
    $userData = $modules->getUserData($uID);
    if ($userData && is_array($userData)) {
        $user = $userData;
    }
}

!$_SESSION['id'] && header('location: ../../login');
