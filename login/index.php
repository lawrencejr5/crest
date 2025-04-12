<!DOCTYPE html>
<html lang="en">

<?php include "../master/head.php" ?>

<body>
  <div class="page-wrapper">
    <!-- header-section start  -->
    <?php include "../master/nav.php" ?>
    <!-- header-section end  -->

    <!-- account section start -->
    <div class="account-section bg_img" data-background="black">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-7">
            <div class="account-card">
              <div class="account-card__header bg_img overlay--one" data-background="black">
                <img src="/crest/assets/images/logoIcon/crest2-nobg.png" alt="image">
                <h2>Welcome To <span class="base--color">Crest Asset Trading</span></h2>
              </div>
              <div class="account-card__body">
                <form id="loginForm" action="" method="post">
                  <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter email" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                  </div>
                  <div class="mt-3">
                    <center><button type="submit" class="cmn-btn">Login Now</button></center>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-sm-6">
                      <p class="f-size-14">Forgot Password? <a href="/crest/reset" class="base--color">Reset Now</a></p>
                    </div>
                    <div class="col-sm-6 text-sm-right">
                      <p class="f-size-14">Haven't an account? <a href="/crest/register" class="base--color">Sign Up</a></p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- account section end -->

    <!-- footer section start -->
    <?php include "../master/footer.php" ?>
    <!-- footer section end -->
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

    function notify(status, message) {
      iziToast[status]({
        message: message,
        position: "topRight"
      });
    }

    $(document).ready(function() {
      $("#loginForm").submit(function(e) {
        e.preventDefault();
        const submitButton = $("#loginForm button[type='submit']");
        submitButton.prop('disabled', true).text("Logging in...");

        // Since the form uses "username" for the email, we extract its value accordingly
        const email = $("input[name='email']").val();
        const password = $("input[name='password']").val();

        $.ajax({
          type: "POST",
          url: "../app/backend/actions/login.php", // Update the path if needed
          data: {
            email: email,
            password: password
          },
          dataType: "json",
          success: function(res) {
            if (res.status === "success") {
              notify("success", res.message);
              window.location.href = "../app/dashboard"; // Adjust the redirection URL as needed
            } else {
              notify("error", res.message);
            }
            submitButton.prop('disabled', false).text("Login Now");
          },
          error: function(xhr, status, error) {
            notify("error", "Error: " + error);
            submitButton.prop('disabled', false).text("Login Now");
          }
        });
      });
    });
  </script>

  <!-- Other scripts (Tawk.to, Smartsupp, etc.) can follow here -->
</body>

</html>