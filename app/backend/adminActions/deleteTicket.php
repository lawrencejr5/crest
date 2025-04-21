<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ticket_id'])) {
        $ticket_id = $_POST['ticket_id'];
        $result = $modules->deleteTicket($ticket_id);
        if ($result) {
            echo json_encode([
                "status" => "success",
                "message" => "Ticket deleted successfully."
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to delete ticket."
            ]);
        }
    } else {
        echo json_encode([
            "status" => "error",
            "message" => "Ticket ID is missing."
        ]);
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method."
    ]);
}
