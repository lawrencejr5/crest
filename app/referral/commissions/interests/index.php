<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../../../backend/udata.php" ?>
<?php include "../../../master/head.php" ?>

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
    <?php include "../../../master/nav.php" ?>
    <!-- header-section end  -->

    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="black">


      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Welcome Back, <?= ucfirst($user['fname']) ?>!</h2>
            <ul class="page-breadcrumb">
              <li><a href="/crest/app/dashboard">User</a></li>
              <li>Interest Referral Commissions</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <section class="cmn-section pt-60">
      <div class="container">
        <div class="row">
          <!-- <div class="col-md-12">
            <div class="right float-md-right float-none text-md-right text-center mb-5">
              <a href="/crest/app/referral/commissions/interests" class="btn cmn-btn mb-md-0 mb-2">
                Deposit Commission
              </a>
              <a href="javascript:void(0)" class="btn cmn-btn mb-md-0 mb-2 btn-disabled">
                Interest Commission
              </a>
              <a href="/crest/app/referral/commissions/invest" class="btn cmn-btn mb-md-0">
                Invest Commission
              </a>
            </div>
          </div> -->
          <div class="col-md-12">
            <div class="table-responsive--md">
              <table class="table style--two">
                <thead>
                  <tr>
                    <th scope="col">From</th>
                    <th scope="col">Details</th>
                    <th scope="col">Bonus</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($user_ref_bonus_deposits) && is_array($user_ref_bonus_deposits)): ?>
                    <?php foreach ($user_ref_bonus_deposits as $deposit): ?>
                      <tr>
                        <!-- From -->
                        <td data-label="From">
                          <?php
                          // $deposit['address'] now contains the user id for the referrer
                          $fromUser = $modules->getUserData($deposit['address']);
                          if ($fromUser) {
                            echo htmlspecialchars($fromUser['fname'] . ' ' . $fromUser['lname']);
                          } else {
                            echo htmlspecialchars($deposit['address']);
                          }
                          ?>
                        </td>
                        <!-- Details / Description -->
                        <td data-label="Details">
                          Referral Bonus Deposit
                        </td>
                        <!-- Amount: referral bonus deposits always appear as positive -->
                        <td data-label="Amount">
                          <strong class="text-success">+ $<?= htmlspecialchars($deposit['dol_val']) ?></strong>
                        </td>
                        <!-- Post Balance -->
                        <td data-label="Remaining Balance">
                          <?= htmlspecialchars($deposit['amount'] ?? 'N/A') ?> <?= $deposit['currency'] ?>
                        </td>

                        <!-- Date -->
                        <td data-label="Date">
                          <?= htmlspecialchars(date("d M, Y h:i A", strtotime($deposit['datetime']))) ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="5" class="text-center text-muted">No referral bonus deposits found.</td>
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
    <?php include "../../../master/footer.php" ?>
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