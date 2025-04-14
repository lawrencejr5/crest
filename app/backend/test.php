<?php
session_start();
include "./module.php";


header('content-type: application/json');

$register = $modules->register("ify82739", "ify", "opu", "hfdfd", "hfhd", "99shja", "agsgs", 123456, null);
echo json_encode($register);

$user = $modules->getUserData($_SESSION['id']);
echo json_encode($user);
