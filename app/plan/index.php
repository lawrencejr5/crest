<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../backend/udata.php" ?>
<?php include "../master/head.php" ?>


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
    <?php include "../master/nav.php" ?>

    <!-- header-section end  -->

    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="black">


      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Welcome Back!</h2>
            <ul class="page-breadcrumb">
              <li><a href="https://assetbase-trading.com">User</a></li>
              <li>Investment Plan</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <section class="pt-60 pb-120">
      <div class="container">
        <div class="row mb-none-30 justify-content-center">
          <?php if (!empty($user_plans)): ?>
            <?php foreach ($user_plans as $plan): ?>
              <div class="col-lg-4 mb-30">
                <div class="package-card text-center bg_img" data-background="https://assetbase-trading.com/assets/templates/bit_gold/images/bg/bg-4.png">
                  <h4 class="package-card__title base--color mb-2" style="text-transform: capitalize;"><?= htmlspecialchars($plan['plan_name']) ?></h4>
                  <ul class="package-card__features mt-4">
                    <li>Return <?= htmlspecialchars($plan['plan_rate']) ?>%</li>
                    <li><?= htmlspecialchars($plan['plan_type']) ?></li>
                    <li>For <?= htmlspecialchars($plan['duration_text']) ?></li>
                    <li>Total <?= htmlspecialchars($plan['total']) ?>%</li>
                  </ul>
                  <div class="package-card__range mt-5 base--color">
                    $<?= htmlspecialchars($plan['plan_min']) ?> - $<?= htmlspecialchars($plan['plan_max']) ?>
                  </div>
                  <a href="javascript:void(0)" data-toggle="modal" data-target="#depoModal" data-resource='{ 
                      "id": "<?= htmlspecialchars($plan['plan_id']) ?>", 
                      "name": "<?= htmlspecialchars($plan['plan_name']) ?>", 
                      "minimum": "<?= htmlspecialchars($plan['plan_min']) ?>", 
                      "maximum": "<?= htmlspecialchars($plan['plan_max']) ?>", 
                      "interest": "<?= htmlspecialchars($plan['plan_rate']) ?>", 
                      "duration": "<?= htmlspecialchars($plan['duration_text']) ?>",
                      "type": "<?= htmlspecialchars($plan['plan_type']) ?>"
                    }' class="cmn-btn btn-md mt-4 investButton">
                    Invest Now
                  </a>
                </div><!-- package-card end -->
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <div class="col-12">
              <p>No plans available.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">

      <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-bg">
          <div class="modal-header">
            <strong class="modal-title text-white" id="ModalLabel">
              Confirm to invest on <span class="planName" style="text-transform: capitalize;"></span> Plan
            </strong>
            <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form id="depositForm" action="https://assetbase-trading.com/user/plans" method="post" class="register">
            <input type="hidden" name="_token" value="v0QlAVhKtAuRzkedf8cRKcXDWi5QXYEAoRmRB7FZ">
            <div class="modal-body">

              <div class="form-group">
                <h6 class="text-center investAmountRenge"></h6>

                <p class="text-center mt-1 interestDetails"></p>
                <p class="text-center interestValidaty"></p>

                <div class="form-group ">
                  <strong class="text-white mb-2 d-block">Select wallet</strong>
                  <select class="form-control" name="wallet_type">
                    <option value="deposit_wallet">Deposit Wallet - $<?= $total_user_balance ?></option>
                    <option value="interest_wallet">Interest Wallet -$0</option>
                  </select>
                </div>
                <input type="hidden" name="plan_id" class="plan_id">
                <input type="hidden" name="dep_wallet" id="" value="<?= $total_user_balance ?>">
                <input type="hidden" name="int_wallet" id="" value="0">

                <div class="form-group">
                  <strong class="text-white mb-2 d-block">Invest Amount</strong>
                  <input type="text" class="form-control fixedAmount" id="fixedAmount" name="amount"
                    value=""
                    onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')"
                    autocomplete="off">
                </div>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-danger"
                data-dismiss="modal">No</button>
              <button type="submit" class="btn cmn-btn">Yes</button>
            </div>

          </form>
        </div>
      </div>
    </div>


    <!-- footer section start -->
    <?php include "../master/footer.php" ?>

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
    (function($) {
      "use strict";
      $(document).on('click', '.investButton', function() {
        // Parse the JSON from the data-resource attribute
        var resourceString = $(this).attr('data-resource');
        var data = JSON.parse(resourceString); // Parse the string to JSON object
        var symbol = "$";

        // Set the range text
        $('.investAmountRenge').text(`Invest: ${symbol}${data.minimum} - ${symbol}${data.maximum}`);
        $('.interestDetails').html(`<strong> Interest: ${data.interest} % ${data.type} for ${data.duration}</strong>`);
        $('.planName').text(data.name);
        $('.plan_id').val(data.id);

        // Store min and max on the modal for later validation
        $("#depoModal").data('min', parseFloat(data.minimum));
        $("#depoModal").data('max', parseFloat(data.maximum));
      });
    })(jQuery);
  </script>

  <script>
    (function($) {
      "use strict";
      $(document).on('submit', '#depositForm', function(e) {
        e.preventDefault();

        // Retrieve the invest amount entered by the user
        var investAmount = parseFloat($('.fixedAmount').val());
        if (isNaN(investAmount)) {
          notify("error", "Please enter a valid amount");
          return;
        }

        // Get the minimum and maximum values stored on the modal
        var minAmount = $("#depoModal").data('min');
        var maxAmount = $("#depoModal").data('max');

        // Validate the invested amount is within the range
        if (investAmount < minAmount) {
          notify("error", "Investment amount cannot be less than $" + minAmount);
          return;
        }
        if (investAmount > maxAmount) {
          notify("error", "Investment amount cannot exceed $" + maxAmount);
          return;
        }

        // Check the wallet balance based on selected wallet
        var walletType = $("select[name='wallet_type']").val();
        if (walletType === "deposit_wallet") {
          var walletBalance = parseFloat($("input[name='dep_wallet']").val());
          if (investAmount > walletBalance) {
            notify("error", "Insufficient deposit wallet balance");
            return;
          }
        } else if (walletType === "interest_wallet") {
          var walletBalance = parseFloat($("input[name='int_wallet']").val());
          if (investAmount > walletBalance) {
            notify("error", "Insufficient interest wallet balance");
            return;
          }
        }

        // Everything is good; disable the submit button and send the AJAX request
        var submitButton = $(this).find('button[type="submit"]');
        submitButton.prop('disabled', true).text("Processing...");

        $.ajax({
          type: "POST",
          url: "../backend/actions/invest.php",
          data: $(this).serialize(),
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              notify("success", response.message);
              window.setTimeout(() => {
                window.location.href = "./";
              }, 2000)
            } else {
              notify("error", response.message);
            }
            submitButton.prop('disabled', false).text("Next");
          },
          error: function(xhr, status, error) {
            notify("error", "Error: " + error);
            submitButton.prop('disabled', false).text("Next");
          }
        });
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





</body>

</html>

</body>

</html>