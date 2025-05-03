<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "../app/backend/module.php";
$modules = new Modules();

// Check for token in URL
if (!isset($_GET['token'])) {
    die("Invalid password reset link.");
}
$token = $_GET['token'];

// Fetch the user by token (for displaying the form)
$user = $modules->getUserByResetToken($token);
if (!$user) {
    die("Invalid or expired token.");
}

// Check if token has expired
if (strtotime($user['reset_expires']) < time()) {
    die("This reset link has expired.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "../master/head.php"; ?>
    <title>Reset Password</title>
</head>

<body>
    <div class="page-wrapper">
        <?php include "../master/nav.php"; ?>

        <div class="reset-container">
            <div class="account-section bg_img">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-lg-7">
                            <div class="account-card">
                                <div class="account-card__body">
                                    <form id="resetPasswordForm" method="post">
                                        <div class="form-group">
                                            <label>New Password:</label>
                                            <input id="new_password" type="password" name="new_password" class="form-control" placeholder="New Password" required autofocus>
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm Password:</label>
                                            <input id="confirm_password" type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                                        </div>
                                        <div class="mt-3">
                                            <button type="submit" class="cmn-btn">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include "../master/footer.php"; ?>
    </div> <!-- page-wrapper end -->

    <!-- jQuery library -->
    <script src="./assets/templates/bit_gold/js/vendor/jquery-3.5.1.min.js"></script>
    <!-- bootstrap js -->
    <script src="./assets/templates/bit_gold/js/vendor/bootstrap.bundle.min.js"></script>
    <!-- slick slider js -->
    <script src="./assets/templates/bit_gold/js/vendor/slick.min.js"></script>
    <script src="./assets/templates/bit_gold/js/vendor/wow.min.js"></script>
    <!-- dashboard custom js -->
    <script src="./assets/templates/bit_gold/js/app.js"></script>

    <link rel="stylesheet" href="./assets/templates/bit_gold/css/iziToast.min.css">
    <script src="./assets/templates/bit_gold/js/iziToast.min.js"></script>

    <script>
        "use strict";

        // notify function using iziToast
        function notify(status, message) {
            iziToast[status]({
                message: message,
                position: "topRight"
            });
        }

        $(document).ready(function() {
            $("#resetPasswordForm").submit(function(e) {
                e.preventDefault();
                const btn = $("#resetPasswordForm button[type='submit']");
                btn.prop('disabled', true).text("Resetting...");
                const newPassword = $("#new_password").val();
                const confirmPassword = $("#confirm_password").val();

                $.ajax({
                    type: "POST",
                    // Append the token to the URL so the endpoint can validate
                    url: "../app/backend/actions/reset_password_action.php?token=<?= htmlspecialchars($token) ?>",
                    data: {
                        new_password: newPassword,
                        confirm_password: confirmPassword
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.status === "success") {
                            notify("success", response.message);
                            // Optionally redirect to login page after a short delay
                            window.setTimeout(() => {
                                window.location.href = "../login";
                            }, 2000);
                        } else {
                            notify("error", response.message);
                        }
                        btn.prop('disabled', false).text("Reset Password");
                    },
                    error: function(xhr, status, error) {
                        notify("error", "Error: " + error);
                        btn.prop('disabled', false).text("Reset Password");
                    }
                });
            });
        });
    </script>
</body>

</html>