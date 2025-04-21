<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['wallet_id'])) {
        $wallet_id = $_POST['wallet_id'];
        $result = $modules->deleteWallet($wallet_id);
        if ($result) {
            echo json_encode([
                "status" => "success",
                "message" => "Wallet deleted successfully."
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to delete wallet."
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Wallet ID is missing."
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method."
    ]);
}
