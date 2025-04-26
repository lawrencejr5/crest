<!-- meta tags and other links -->
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
              <li>My referred Users</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <section class="cmn-section">
      <div class="container">
        <div class="row justify-content-center mt-2">
          <div class="col-md-12">
            <div class="table-responsive--md">
              <table class="table style--two">
                <thead>
                  <tr>
                    <th scope="col">SL</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Joined At</th>
                  </tr>
                </thead>
                <tbody class="list">
                  <?php if (!empty($user_referrals)): ?>
                    <?php foreach ($user_referrals as $index => $referral): ?>
                      <tr>
                        <td data-label="S/N"><?= $index + 1 ?></td>
                        <td data-label="Fullname"><?= htmlspecialchars($referral['fname'] . ' ' . $referral['lname']) ?></td>
                        <td data-label="Joined At">
                          <?php
                          // Adjust "created_at" to your actual field name for when the user joined
                          echo htmlspecialchars(date("d M, Y h:i A", strtotime($referral['datetime'])));
                          ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="3" class="text-center">No referrals found.</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>




    <!-- footer section start -->
    <?php include "../../master/footer.php" ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->
  <!-- jQuery library -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold//js/vendor/jquery-3.5.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold//js/vendor/bootstrap.bundle.min.js"></script>

  <!-- slick slider js -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold//js/vendor/slick.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold//js/vendor/wow.min.js"></script>
  <!-- dashboard custom js -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold//js/app.js"></script>


  <script>
    (function() {
      "use strict";
      $(document).on("change", ".langSel", function() {
        window.location.href = "https://assetbase-trading.com/change/" + $(this).val();
      });

      $('.policy').on('click', function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.get('https://assetbase-trading.com/cookie/accept', function(response) {
          iziToast.success({
            message: response,
            position: "topRight"
          });
          $('.cookie__wrapper').addClass('d-none');
        });
      });
    })();
  </script>


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
    (function() {
      "use strict";
      $(document).on("change", ".langSel", function() {
        window.location.href = "https://assetbase-trading.com/change/" + $(this).val();
      });
    })();
  </script>





</body>

</html>

</body>

</html>