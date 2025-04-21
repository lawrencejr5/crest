<?php
include "../module.php";
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['ticket_id'])) {
        $ticket_id = $_POST['ticket_id'];

        // For this example, we assume you're updating the ticket's status.
        if (!isset($_POST['status'])) {
            echo json_encode([
                "status" => "error",
                "message" => "Status not provided."
            ]);
            exit;
        }

        $fields = [
            'status' => $_POST['status']
            // Add more fields here if needed.
        ];

        $result = $modules->updateTicket($ticket_id, $fields);
        if ($result) {
            echo json_encode([
                "status" => "success",
                "message" => "Ticket updated successfully."
            ]);
        } else {
            echo json_encode([
                "status" => "error",
                "message" => "Failed to update ticket."
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
