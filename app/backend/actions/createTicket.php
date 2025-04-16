<?php
header('Content-Type: application/json');
session_start();
include "../module.php";

$data = array();

// Validate that required fields are provided (user_id may be set in session)
if (isset($_SESSION['user_id'], $_POST['fullname'], $_POST['email'], $_POST['subject'], $_POST['message'])) {
    $user_id  = $_SESSION['user_id'];
    $ticket_id = uniqid("ticket_"); // Generate a unique ticket ID
    $fullname  = $_POST['fullname'];
    $email     = $_POST['email'];
    $subject   = $_POST['subject'];
    $message   = $_POST['message'];

    // Status can be pre-defined, e.g., "open"
    $status    = "pending";

    // Handle file upload if provided
    $fileNameToStore = "";
    if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath   = $_FILES['file']['tmp_name'];
        $fileName      = $_FILES['file']['name'];
        $fileNameCmps  = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name and generate a new name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Allowed file extensions. Adjust if needed.
        $allowedExtensions = array('jpg', 'jpeg', 'png', 'pdf', 'doc', 'docx');
        if (in_array($fileExtension, $allowedExtensions)) {
            $uploadDir = '../../uploads/tickets/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $dest_path = $uploadDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $fileNameToStore = $newFileName;
            } else {
                $data['status'] = "error";
                $data['message'] = "File upload failed.";
                echo json_encode($data);
                exit();
            }
        } else {
            $data['status'] = "error";
            $data['message'] = "Upload failed. Allowed file types: " . implode(', ', $allowedExtensions);
            echo json_encode($data);
            exit();
        }
    }

    // Instantiate Modules
    $modules = new Modules();
    $result = $modules->createTicket($user_id, $ticket_id, $fullname, $email, $subject, $fileNameToStore, $status, $message);

    if ($result) {
        $data['status'] = "success";
        $data['message'] = "Ticket created successfully.";
    } else {
        $data['status'] = "error";
        $data['message'] = "Ticket creation failed.";
    }
} else {
    $data['status'] = "error";
    $data['message'] = "Missing required fields.";
}

echo json_encode($data);
