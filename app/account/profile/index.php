<!DOCTYPE html>
<html lang="en">

<?php include "../../backend/udata.php" ?>
<?php include "../../master/head.php" ?>

<body>

  <style>
    .imagePreview {
      background-position: center;
      background-repeat: no-repeat;
      width: 180px;
      height: 180px;
      border-radius: 50%;
      background-size: cover;
      border: 2px solid #ddd;
      margin: 1rem 0;
    }
  </style>

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
      <div id="stars"></div>
      <div id="stars2"></div>
      <div id="stars3"></div>
      <div id="stars4"></div>
    </div>
    <!-- / STAR ANIMATION -->
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
            <h2 class="page-title">Welcome Back!</h2>
            <ul class="page-breadcrumb">
              <li><a href="https://assetbase-trading.com">User</a></li>
              <li>Profile Setting</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->

    <!-- Profile Form -->
    <section class="cmn-section">
      <div class="container">
        <div class="card">
          <form id="profileForm" action="../../backend/actions/updateUser.php" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="row">
                <!-- Avatar Upload -->
                <div class="col-md-4">
                  <div class="avatar-upload">
                    <div class="avatar-edit">
                      <input type="file" name="pic" id="imageUpload" class="upload" accept=".png, .jpg, .jpeg" />
                      <label for="imageUpload" class="imgUp"></label>
                    </div>
                    <div class="avatar-preview">
                      <div class=" imagePreview" style="background-image: url(<?php echo isset($user['pic']) && !empty($user['pic']) ? ('../../uploads/profile/' . $user['pic']) : 'https://assetbase-trading.com/assets/images/default.png'; ?>)">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Profile Data -->
                <div class="col-md-8">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control form-control-lg" placeholder="First Name" value="<?= htmlspecialchars($user['fname']) ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control form-control-lg" placeholder="Last Name" value="<?= htmlspecialchars($user['lname']) ?>">
                      </div>
                    </div>
                    <!-- Read-only: Username -->
                    <!-- <div class="col-md-6">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="usernameDisplay" class="form-control form-control-lg" placeholder="Username" value="<?= htmlspecialchars($user['username'] ?? '') ?>" readonly>
                      </div>
                    </div> -->
                    <!-- Read-only: Email (with hidden input) -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="emailDisplay" class="form-control form-control-lg" placeholder="Email" value="<?= htmlspecialchars($user['email'] ?? '') ?>" readonly>
                        <input type="hidden" name="email" value="<?= htmlspecialchars($user['email'] ?? '') ?>">
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Additional Data -->
                <div class="col-md-12">
                  <div class="row">
                    <!-- Read-only Mobile (with hidden input) -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Mobile</label>
                        <input type="text" name="mobileDisplay" class="form-control form-control-lg" placeholder="Mobile" value="<?= htmlspecialchars($user['phone'] ?? '') ?>" disabled>
                        <input type="hidden" name="phone" value="<?= htmlspecialchars($user['phone'] ?? '') ?>">
                      </div>
                    </div>
                    <!-- Read-only Country (with hidden input) -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" value="<?= htmlspecialchars($user['country'] ?? 'Nigeria') ?>" disabled>
                        <input type="hidden" name="country" value="<?= htmlspecialchars($user['country'] ?? 'Nigeria') ?>">
                      </div>
                    </div>
                    <!-- Updatable Address -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control form-control-lg" placeholder="Address" value="<?= htmlspecialchars($user['address'] ?? '') ?>">
                      </div>
                    </div>
                    <!-- Updatable State -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>State</label>
                        <input type="text" name="state" class="form-control form-control-lg" placeholder="State" value="<?= htmlspecialchars($user['state'] ?? '') ?>">
                      </div>
                    </div>
                    <!-- Updatable Zip -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Zip</label>
                        <input type="text" name="zip" class="form-control form-control-lg" placeholder="Zip" value="<?= htmlspecialchars($user['zip'] ?? '') ?>">
                      </div>
                    </div>
                    <!-- Updatable City -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" name="city" class="form-control form-control-lg" placeholder="City" value="<?= htmlspecialchars($user['city'] ?? '') ?>">
                      </div>
                    </div>
                    <!-- Hidden: current_pic (if no new file is uploaded) -->
                    <input type="hidden" name="current_pic" value="<?= htmlspecialchars($user['pic'] ?? '') ?>">
                  </div>
                </div>

              </div>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-md w-100 cmn-btn">Update</button>
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
  <!-- jQuery library -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold//js/vendor/jquery-3.5.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold//js/vendor/bootstrap.bundle.min.js"></script>
  <!-- slick slider js -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold//js/vendor/slick.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold//js/vendor/wow.min.js"></script>
  <!-- dashboard custom js -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold//js/app.js"></script>
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
    (function($) {
      "use strict";
      // Bind change event directly to the file input
      $("#imageUpload").on("change", function() {
        if (this.files && this.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
            // Update the background image of the preview container
            $(".avatar-upload .imagePreview").css("background-image", "url(" + e.target.result + ")");
            $(".avatar-upload .imagePreview").hide().fadeIn(650);
          }
          reader.readAsDataURL(this.files[0]);
        }
      });
    })(jQuery);
  </script>

  <script>
    (function() {
      "use strict";
      $(document).on("change", ".langSel", function() {
        window.location.href = "https://assetbase-trading.com/change/" + $(this).val();
      });
    })();
  </script>

  <script>
    "use strict";
    $(document).ready(function() {
      $("#profileForm").on("submit", function(e) {
        e.preventDefault();
        var submitButton = $(this).find('button[type="submit"]');
        submitButton.prop('disabled', true).text("Updating...");

        var formData = new FormData(this);
        $.ajax({
          url: $(this).attr("action"),
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(resp) {
            var data = (typeof resp === "object") ? resp : JSON.parse(resp);
            notify(data.status, data.message);
            // Reset button after update
            submitButton.prop('disabled', false).text("Update");
          },
          error: function(xhr, status, error) {
            notify("error", "Error: " + error);
            submitButton.prop('disabled', false).text("Update");
          }
        });
      });
    });
  </script>

</body>

</html>