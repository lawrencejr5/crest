<!DOCTYPE html>
<html lang="en">

<?php include "../../backend/udata.php" ?>
<?php include "../../master/head.php" ?>

<body>

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon">
      <i class="fa fa-rocket" aria-hidden="true"></i>
    </span>
  </div>
  <!-- scroll-to-top end -->

  <div class="full-wh">
    <!-- STAR ANIMATION -->
    <div class="bg-animation">
      <div id='stars'></div>
      <div id='stars2'></div>
      <div id='stars3'></div>
      <div id='stars4'></div>
    </div><!-- / STAR ANIMATION -->
  </div>

  <div class="page-wrapper">
    <!-- header-section start  -->
    <?php include "../../master/nav.php" ?>
    <!-- header-section end  -->

    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="black">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Welcome Back, <?= ucfirst($user['fname']) ?>!</h2>
            <ul class="page-breadcrumb">
              <li><a href="<?= $root ?>/app/dashboard">User</a></li>
              <li>CHANGE PASSWORD</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->

    <!-- Password Change Form -->
    <section class="cmn-section">
      <div class="container">
        <div class="card">
          <!-- Set form action to updatePassword.php -->
          <form id="passwordForm" action="../../backend/actions/updatePassword.php" method="post">
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Enter Old Password</label>
                    <input type="password" name="old_password" class="form-control form-control-lg" required>
                  </div>
                  <div class="form-group">
                    <label>Enter New Password</label>
                    <input type="password" name="new_password" class="form-control form-control-lg" required>
                  </div>
                  <div class="form-group">
                    <label>Re-type New Password</label>
                    <input type="password" name="new_password_confirmation" class="form-control form-control-lg" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-md w-100 cmn-btn">Update Password</button>
            </div>
          </form>
        </div>
      </div>
    </section>

    <!-- footer section start -->
    <?php include "../../master/footer.php" ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->

  <!-- Scripts -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/jquery-3.5.1.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/bootstrap.bundle.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/slick.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/wow.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/app.js"></script>
  <link rel="stylesheet" href="https://assetbase-trading.com/assets/templates/bit_gold/css/iziToast.min.css">
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/iziToast.min.js"></script>

  <script>
    "use strict";

    function notify(status, message) {
      iziToast[status]({
        message: message,
        position: "topRight"
      });
    }
  </script>

  <script>
    "use strict";
    $(document).ready(function() {
      $("#passwordForm").on("submit", function(e) {
        e.preventDefault();

        // Validate that new password and confirmation match
        var newPassword = $('input[name="new_password"]').val();
        var confirmPassword = $('input[name="new_password_confirmation"]').val();
        if (newPassword !== confirmPassword) {
          notify("error", "New password and confirmation do not match.");
          return;
        }

        var submitButton = $(this).find('button[type="submit"]');
        submitButton.prop('disabled', true).text("Updating...");
        var formData = $(this).serialize();
        $.ajax({
          url: $(this).attr("action"),
          type: "POST",
          data: formData,
          success: function(resp) {
            var data = (typeof resp === "object") ? resp : JSON.parse(resp);
            notify(data.status, data.message);

            window.setTimeout(function() {
              window.location.href = "../../logout";
            }, 2000);
            submitButton.prop('disabled', false).text("Update Password");
          },
          error: function(xhr, status, error) {
            notify("error", "Error: " + error);
            submitButton.prop('disabled', false).text("Update Password");
          }
        });
      });
    });
  </script>

</body>

</html>