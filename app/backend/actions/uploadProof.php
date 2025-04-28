<?php
header('Content-Type: application/json');
session_start();
include "../module.php";

$data = array();

// Check that all required non-password fields are present
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['transac_id'])) {

    $proof = '';
    $transac_id = $_POST['transac_id'];
    if (isset($_FILES['proof']) && $_FILES['proof']['error'] === UPLOAD_ERR_OK) {
        // Get details of the uploaded file
        $fileTmpPath   = $_FILES['proof']['tmp_name'];
        $fileName      = $_FILES['proof']['name'];
        $fileNameCmps  = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name and set new name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Allowed file extensions for picture file
        $allowedfileExtensions = array('jpg', 'jpeg', 'png', 'pdf', 'epub', 'docx');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Define the upload directory – make sure it exists (and create it if not)
            $uploadFileDir = '../../uploads/proof/';
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $proof = $newFileName;
            } else {
                $data['status'] = "error";
                $data['message'] = "File upload failed.";
                echo json_encode($data);
                exit();
            }
        } else {
            $data['status'] = "error";
            $data['message'] = "Upload failed. Allowed file types: " . implode(',', $allowedfileExtensions);
            echo json_encode($data);
            exit();
        }
    } else {
        // No new file uploaded; you might want to use the current picture
        // For example, if the form has a hidden input with the current pic value:
        $proof = isset($_POST['current_pic']) ? $_POST['current_pic'] : '';
    }

    // Call the updateUserData function (without updating password)
    $result = $modules->uploadProof($transac_id, $proof);

    if ($result) {
        $data['status']  = "success";
        $data['message'] = "Proof uploaded successfully";
    } else {
        $data['status']  = "error";
        $data['message'] = "Failed to upload proof";
    }
} else {
    $data['status']  = "error";
    $data['message'] = "Missing required parameters";
}

echo json_encode($data);
