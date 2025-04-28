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
            <h2 class="page-title">Welcome Back, <?= ucfirst($user['fname']) ?>!</h2>
            <ul class="page-breadcrumb">
              <li><a href="<?= $root ?>/app/dashboard">User</a></li>
              <li>Deposit Methods</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <section class="pt-60 pb-150">

      <div class="container">
        <div class="row">

          <div class="col-md-12">
            <div class="right float-right mb-5">
              <a href="<?= $root ?>/app/deposit/history" class="btn cmn-btn">
                Deposit History
              </a>
            </div>
          </div>

          <?php if (!empty($wallets) && is_array($wallets)): ?>
            <?php foreach ($wallets as $wallet): ?>
              <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="card">
                  <div class="card-body b-primary">
                    <div class="row justify-content-center">
                      <div class="col-md-5 col-sm-12">
                        <img src="https://assetbase-trading.com/assets/images/gateway/<?= htmlspecialchars($wallet['wallet_img']) ?>" class="card-img-top w-100" alt="<?= htmlspecialchars($wallet['wallet_name']) ?>">
                      </div>
                      <div class="col-md-7 col-sm-12">
                        <ul class="list-group text-center">
                          <li class="list-group-item">
                            <?= htmlspecialchars($wallet['wallet_name']) ?>
                          </li>
                          <li class="list-group-item">
                            Limit : <?= htmlspecialchars($wallet['wallet_min']) ?> - <?= htmlspecialchars($wallet['wallet_max']) ?> USD
                          </li>
                          <li class="list-group-item">
                            Charge - 0 USD + 0%
                          </li>
                          <li class="list-group-item">
                            <button type="button" data-id="<?= htmlspecialchars($wallet['wallet_id']) ?>"
                              data-resource='<?php echo json_encode($wallet); ?>'
                              class="btn deposit cmn-btn w-100" data-toggle="modal" data-target="#exampleModal">
                              Deposit
                            </button>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
        </div>
      </div>
    </section>



    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-bg">
          <div class="modal-header">
            <strong class="modal-title method-name text-white" id="exampleModalLabel"></strong>
            <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form id="depositForm" method="post" class="register">
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" name="transac_id" value="<?= uniqid("dep_") ?>">
                <input type="hidden" name="currency" class="edit-currency" value="">
                <input type="hidden" name="type" value="deposit">
                <input type="hidden" name="address" value="">
                <!-- New hidden field for the converted amount -->
                <input type="hidden" name="converted_amount" id="convertedAmountInput" value="">
              </div>
              <div class="form-group">
                <label>Enter Amount (in USD):</label>
                <div class="input-group">
                  <input id="usdAmount" type="text" class="form-control form-control-lg" name="amount" placeholder="0.00" required autocomplete="off">
                  <div class="input-group-prepend">
                    <span class="input-group-text currency-addon addon-bg">USD</span>
                  </div>
                </div>
                <br>
                <small style="float: right;" id="convertedAmount"></small>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn-md cmn-btn">Next</button>
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
    "use strict";
    $(document).ready(function() {
      // Reset the deposit form when the modal is closed
      $('#exampleModal').on('hidden.bs.modal', function() {
        let currency = $("input[name='currency']").val();
        $("#depositForm")[0].reset();
        $("#convertedAmount").text(`You will pay 0 ${currency}`);
        $("#convertedAmountInput").val("");
      });

      // When a deposit button is clicked...
      $(".deposit").on("click", function() {
        let resourceStr = $(this).attr("data-resource");
        let depositMethod = JSON.parse(resourceStr);

        let targetCurrency = depositMethod.wallet_short;
        let targetAddress = depositMethod.wallet_address;
        // Set min and max on the modal using jQuery's data method
        $("#exampleModal").data("walletMin", depositMethod.wallet_min);
        $("#exampleModal").data("walletMax", depositMethod.wallet_max);

        $("input[name='currency']").val(targetCurrency);
        $("input[name='address']").val(targetAddress);
        $("#exampleModalLabel").text("Depositing with " + targetCurrency);
      });

      const convert = async (curr1, curr2, amount) => {
        try {
          const res = await fetch(`https://api.coinconvert.net/convert/${curr1}/${curr2}?amount=${amount}`);
          const data = await res.json();
          const test = Object.values(data);
          const val = test[2];
          return val ? val : amount;
        } catch (error) {
          console.log(error);
          return amount;
        }
      };

      $("#usdAmount").on("input", async function() {
        let amountVal = $(this).val();
        let currency = $("input[name='currency']").val();
        if (isNaN(amountVal) || amountVal === "") {
          $("#convertedAmount").text(`You will pay 0 ${currency}`);
          $("#convertedAmountInput").val("");
          return;
        }
        let targetCurrency = $("input[name='currency']").val() || "USD";

        // Show loading text and disable the Next button while fetching conversion
        $("#convertedAmount").text("...");
        const submitButton = $("#depositForm button[type='submit']");
        submitButton.prop("disabled", true);

        const convertedVal = await convert("USD", targetCurrency, amountVal);

        $("#convertedAmount").text(`You will pay ${convertedVal} ${targetCurrency}`);
        // Update the hidden field with the converted amount
        $("#convertedAmountInput").val(convertedVal);
        submitButton.prop("disabled", false);
      });

      $("#depositForm").on("submit", function(e) {
        e.preventDefault();
        const submitButton = $(this).find("button[type='submit']");
        submitButton.prop("disabled", true).text("Processing...");

        // Get the deposit amount entered by the user
        let depositAmount = parseFloat($("#usdAmount").val());
        // Retrieve the min and max set on the modal (from the chosen wallet)
        let minDeposit = parseFloat($("#exampleModal").data("walletMin"));
        let maxDeposit = parseFloat($("#exampleModal").data("walletMax"));

        // Validate deposit amount is within the allowed limits
        if (depositAmount < minDeposit) {
          notify("error", "Deposit amount cannot be less than " + minDeposit + " USD");
          submitButton.prop("disabled", false).text("Next");
          return;
        } else if (depositAmount > maxDeposit) {
          notify("error", "Deposit amount cannot exceed " + maxDeposit + " USD");
          submitButton.prop("disabled", false).text("Next");
          return;
        }

        // Get values from the form
        var transac_id = $(this).find("input[name='transac_id']").val();
        var dol_val = $(this).find("input[name='amount']").val();
        var currency = $(this).find("input[name='currency']").val();
        var type = $(this).find("input[name='type']").val();
        var address = $(this).find("input[name='address']").val();
        var converted_amount = $(this).find("input[name='converted_amount']").val();

        $.ajax({
          type: "POST",
          url: "../backend/actions/deposit.php",
          data: {
            transac_id: transac_id,
            dol_val: dol_val,
            currency: currency,
            type: type,
            address: address,
            amount: converted_amount
          },
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              notify("success", response.message);
              // Redirect to the preview page with all necessary parameters (URL encoded)
              window.setTimeout(() => {
                window.location.href = "../deposit/preview/index.php?" +
                  "address=" + encodeURIComponent(address) +
                  "&transac_id=" + encodeURIComponent(transac_id) +
                  "&currency=" + encodeURIComponent(currency) +
                  "&usd=" + encodeURIComponent(dol_val) +
                  "&converted=" + encodeURIComponent(converted_amount);
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
    });
  </script>

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
    // Notification function
    function notify(status, message) {
      iziToast[status]({
        message: message,
        position: "topRight"
      });
    }
  </script>

</body>

</html>

</body>

</html>