<?php
header('Content-Type: application/json');
session_start();
include "../module.php";

$data = array();

// Check that all required non-password fields are present
if (isset(
    $_POST['fname'],
    $_POST['lname'],
    $_POST['email'],
    $_POST['phone'],
    $_POST['country'],
    $_POST['address'],
    $_POST['zip'],
    $_POST['city'],
    $_POST['state']
)) {

    $user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
    if (!$user_id) {
        $data['status'] = "error";
        $data['message'] = "User not logged in";
        echo json_encode($data);
        exit();
    }

    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $country = $_POST['country'];
    $address = $_POST['address'];
    $zip     = $_POST['zip'];
    $city    = $_POST['city'];
    $state   = $_POST['state'];

    // Handle picture upload if a new file is provided
    $pic = ''; // Default value (could set to current pic value if desired)
    if (isset($_FILES['pic']) && $_FILES['pic']['error'] === UPLOAD_ERR_OK) {
        // Get details of the uploaded file
        $fileTmpPath   = $_FILES['pic']['tmp_name'];
        $fileName      = $_FILES['pic']['name'];
        $fileNameCmps  = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Sanitize file name and set new name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        // Allowed file extensions for picture file
        $allowedfileExtensions = array('jpg', 'jpeg', 'png');
        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Define the upload directory – make sure it exists (and create it if not)
            $uploadFileDir = '../../uploads/profile/';
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0755, true);
            }
            $dest_path = $uploadFileDir . $newFileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $pic = $newFileName;
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
        $pic = isset($_POST['current_pic']) ? $_POST['current_pic'] : '';
    }

    // Call the updateUserData function (without updating password)
    $result = $modules->updateUserData($user_id, $fname, $lname, $email, $phone, $country, $address, $zip, $city, $state, $pic);

    if ($result) {
        $data['status']  = "success";
        $data['message'] = "User data updated successfully";
    } else {
        $data['status']  = "error";
        $data['message'] = "Failed to update user data";
    }
} else {
    $data['status']  = "error";
    $data['message'] = "Missing required parameters";
}

echo json_encode($data);
