<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure all required parameters are provided.
    if (isset($_POST['wallet_name'], $_POST['wallet_short'], $_POST['wallet_min'], $_POST['wallet_max'], $_POST['wallet_address'])) {
        $wallet_id      = uniqid("wlt_"); // Generate a unique wallet ID.
        $wallet_name    = $_POST['wallet_name'];
        $wallet_short   = $_POST['wallet_short'];
        $wallet_min     = $_POST['wallet_min'];
        $wallet_max     = $_POST['wallet_max'];
        $wallet_address = $_POST['wallet_address'];

        $result = $modules->createWallet($wallet_id, $wallet_name, $wallet_short, $wallet_min, $wallet_max, $wallet_address);
        if ($result) {
            echo json_encode([
                "status" => "success",
                "message" => "Wallet created successfully."
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to create wallet."
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Required parameters are missing."
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method."
    ]);
}
