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
              <li>Interest log</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <script>
      "use strict"

      function createCountDown(elementId, sec) {
        var tms = sec;
        var x = setInterval(function() {
          var distance = tms * 1000;
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
          document.getElementById(elementId).innerHTML = days + "d: " + hours + "h " + minutes + "m " + seconds + "s ";
          if (distance < 0) {
            clearInterval(x);
            document.getElementById(elementId).innerHTML = "COMPLETE";
          }
          tms--;
        }, 1000);
      }
    </script>

    <section class="cmn-section pt-60">

      <div class="container">

        <div class="row justify-content-center mt-2">
          <div class="col-md-12">
            <div class="right float-right mb-5">
              <a href="../" class="btn cmn-btn">
                Investment Plan
              </a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="table-responsive--md">
              <table class="table style--two">
                <thead>
                  <tr>
                    <th scope="col">Plan</th>
                    <th scope="col">Amount Invested</th>
                    <th scope="col">Net Profit</th>
                    <th scope="col">Amount Earned</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Days Invested</th>
                    <th scope="col">Status</th>
                    <th scope="col">Last updated</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($user_investments) && is_array($user_investments)): ?>
                    <?php foreach ($user_investments as $investment): ?>
                      <?php
                      // Retrieve plan details for this investment
                      $planDetails = $modules->getPlan($investment['plan_id']);
                      // Calculate net profit (expected minus the invested amount)
                      $netProfit = $investment['expected'];
                      // Determine status color
                      $statusColor = 'inherit';
                      if (strtolower($investment['status']) === 'active') {
                        $statusColor = 'green';
                      } elseif (strtolower($investment['status']) === 'ended') {
                        $statusColor = 'grey';
                      }
                      ?>
                      <tr>
                        <!-- Plan Name -->
                        <td data-label="Plan" style="text-transform: capitalize;">
                          <?= htmlspecialchars(isset($planDetails['plan_name']) ? $planDetails['plan_name'] : "N/A") ?> plan
                        </td>

                        <!-- Amount Invested -->
                        <td data-label="Amount Invested">$<?= htmlspecialchars(number_format($investment['amount'], 2)) ?></td>

                        <!-- Net Profit -->
                        <td data-label="Net Profit">$<?= htmlspecialchars(number_format($netProfit, 2)) ?></td>

                        <!-- Amount Earned So Far -->
                        <td data-label="Amount Earned">$<?= htmlspecialchars(number_format($investment['earned'], 2)) ?></td>

                        <!-- Duration: Start Date to End Date -->
                        <td data-label="Duration">
                          <?= htmlspecialchars(date("d M, Y", strtotime($investment['start_date']))) ?> -
                          <?= htmlspecialchars(date("d M, Y", strtotime($investment['end_date']))) ?>
                        </td>

                        <!-- Number of Days Invested -->
                        <td data-label="Days Invested"><?= htmlspecialchars($investment['num_of_days']) ?></td>

                        <!-- Status -->
                        <td data-label="Status" style="color: <?= $statusColor; ?>;">
                          <?= htmlspecialchars(ucfirst($investment['status'])) ?>
                        </td>
                        <td data-label="Last Updated"><?= htmlspecialchars(date("d M, Y", strtotime($investment['last_updated']))) ?></td>

                        <td data-label="Action">
                          <?php if ($investment['status'] === "ended" &&  $investment['interest_wallet'] != 0): ?>
                            <form class="claim_invest_form">
                              <input type="hidden" class="invest_id" name="invest_id" value="<?= $investment['invest_id'] ?>">
                              <input type="hidden" class="amount" name="amount" value="<?= $investment['interest_wallet'] ?>">
                              <input type="hidden" class="dol_val" name="dol_val" value="<?= $investment['interest_wallet'] ?>">
                              <input type="hidden" class="currency" name="currency" value="USD">
                              <input type="hidden" class="type" name="type" value="investment_returns">
                              <input type="hidden" class="address" name="address" value="N/A">
                              <button class="btn btn-success btn-sm" class="claim-btn" id="claim-btn">Claim $<?= $investment['interest_wallet'] ?></button>
                            </form>
                          <?php else: ?>
                            <button type="button" class="btn btn-secondary btn-sm">Claim</button>
                          <?php endif; ?>

                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="7" class="text-center">No result found</td>
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
    $(document).ready(() => {


      $(".claim_invest_form").on("submit", function(e) {
        e.preventDefault()
        const submitButton = $(this).find("#claim-btn")
        submitButton.prop("disabled", true).text("Claiming...");

        let amount = $(this).find(".amount").val();
        let dol_val = $(this).find(".dol_val").val();
        let type = $(this).find(".type").val();
        let currency = $(this).find(".currency").val();
        let address = $(this).find(".address").val();
        let invest_id = $(this).find(".invest_id").val();

        console.log(amount, dol_val, type, currency, address, invest_id)

        $.ajax({
          type: "POST",
          url: "../../backend/actions/claimInvest.php",
          data: {
            invest_id,
            dol_val,
            currency,
            type,
            address,
            amount
          },
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              notify("success", response.message);
              submitButton.prop('disabled', true).text("Claimed");
            } else {
              notify("error", response.message);
              submitButton.prop('disabled', false).text("Try again");
            }
          },
          error: function(xhr, status, error) {
            notify("error", "Error: " + error);
            submitButton.prop('disabled', false).text("Next");
          }
        });

      })





    })
  </script>
  <!-- 
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
  </script> -->


  <link rel="stylesheet" href="https://assetbase-trading.com/assets/templates/bit_gold/css/iziToast.min.css">



  <!-- <script>
    (function() {
      "use strict";
      $(document).on("change", ".langSel", function() {
        window.location.href = "https://assetbase-trading.com/change/" + $(this).val();
      });
    })();
  </script> -->





</body>

</html>

</body>

</html>