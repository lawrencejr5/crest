<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../master/head.php" ?>

<body>
  <div class="page-wrapper">
    <!-- header-section start  -->
    <?php include "../master/nav.php" ?>
    <!-- header-section end  -->

    <!-- account section start -->
    <div class="account-section bg_img">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-7">
            <div class="account-card">

              <div class="account-card__body">
                <h2>Reset Password</h2>
                <form id="resetForm" action="" method="post">
                  <div class="form-group">
                    <label>Email Address</label>
                    <input id="email" type="email" name="email" class="form-control" placeholder="Email Address" required autocomplete="email" autofocus>
                  </div>
                  <div class="mt-3">
                    <center><button type="submit" class="cmn-btn">Send Password Reset Code</button></center>
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

    // notify function using iziToast
    function notify(status, message) {
      iziToast[status]({
        message: message,
        position: "topRight"
      });
    }

    $(document).ready(function() {
      $("#resetForm").submit(function(e) {
        e.preventDefault();
        const btn = $("#resetForm button[type='submit']");
        btn.prop('disabled', true).text("Sending...");
        const email = $("input[name='email']").val();

        $.ajax({
          type: "POST",
          url: "../app/backend/actions/reset_request.php",
          data: {
            email: email
          },
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              notify("success", response.message);
            } else {
              notify("error", response.message);
            }
            btn.prop('disabled', false).text("Send Password Reset Code");
          },
          error: function(xhr, status, error) {
            notify("error", "Error: " + error);
            btn.prop('disabled', false).text("Send Password Reset Code");
          }
        });
      });
    });
  </script>
</body>

</html>