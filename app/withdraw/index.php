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
              <li>Withdraw Money</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <section class="cmn-section pt-60">
      <div class="container ">
        <div class="row mb-60-80 justify-content-center">
          <div class="col-md-12">
            <div class="right float-right mb-5">
              <a href="./history" class="btn cmn-btn">
                Withdraw History
              </a>
            </div>
          </div>
        </div>
        <div class="container">
          <div class="row mb-60-80 justify-content-center">
            <?php if (!empty($wallets) && is_array($wallets)): ?>
              <?php foreach ($wallets as $wallet): ?>
                <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                  <div class="card card-deposit b-primary">
                    <div class="card-body card-body-deposit">
                      <div class="row">
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
                                class="btn btn-block cmn-btn withdraw" data-toggle="modal" data-target="#withdrawModal">
                                Withdraw Now
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
      </div>
    </section>


    <!-- Withdraw Modal -->
    <div class="modal fade" id="withdrawModal" tabindex="-1" role="dialog" aria-labelledby="withdrawModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-bg">
          <div class="modal-header">
            <strong class="modal-title" id="withdrawModalLabel">Withdraw Via</strong>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="withdrawForm" method="post" class="register" autocomplete="nope">
            <div class="modal-body">
              <div class="form-group">
                <!-- Hidden currency field (will be updated by jQuery when a button is clicked) -->
                <input type="hidden" name="currency" class="edit-currency" value="">
                <!-- Indicate withdrawal type -->
                <input type="hidden" name="type" value="withdraw">
              </div>
              <div class="form-group">
                <label>Balance (USD):</label>
                <div class="input-group">
                  <input id="balance" type="text" class="form-control form-control-lg" name="balance" value="$<?= $total_user_balance ?>" placeholder="" required autocomplete="nope" readonly>

                </div>
              </div>
              <div class="form-group">
                <label>Enter Amount (in USD):</label>
                <div class="input-group">
                  <input id="dol_val" type="text" class="form-control form-control-lg" name="dol_val" placeholder="0.00" required autocomplete="nope">
                  <div class="input-group-prepend">
                    <span class="input-group-text currency-addon addon-bg">USD</span>
                  </div>
                </div>
              </div>
              <br>
              <small style="float: right;" id="convertedAmount"></small>
              <!-- Hidden field for convertedAmount – here, we assume no conversion so equals the input amount -->
              <input type="hidden" autocomplete="nope" name="amount" id="convertedAmountInput" value="">
              <div class="form-group">
                <label>Enter Your Withdrawal Address:</label>
                <input type="text" class="form-control" name="address" placeholder="Enter your wallet address" required autocomplete="nope">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-md btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn-md cmn-btn">Confirm</button>
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

      // Convert function remains unchanged
      const convert = async (curr1, curr2, amount) => {
        try {
          const res = await fetch(`https://api.coinconvert.net/convert/${curr1}/${curr2}?amount=${amount}`);
          const data = await res.json();
          const test = Object.values(data);
          const val = test[2];
          return val ? val : amount;
        } catch (error) {
          console.error(error);
          return amount;
        }
      };

      // Function to update the conversion result for withdrawal (if needed)
      async function updateWithdrawConversion() {
        let usdVal = $("#dol_val").val();
        let rawCurrency = $("input[name='currency']").val() || "USD";
        let targetCurrency = rawCurrency;

        if (isNaN(usdVal) || usdVal === "") {
          $("#convertedAmount").text(`You will receive 0 ${targetCurrency}`);
          $("#convertedAmountInput").val("0");
          return;
        }

        $("#convertedAmount").text("...");
        const submitButton = $("#withdrawForm button[type='submit']");
        submitButton.prop("disabled", true);

        const convertedVal = await convert("USD", targetCurrency, usdVal);
        $("#convertedAmount").text(`You will receive ${convertedVal} ${targetCurrency}`);
        $("#convertedAmountInput").val(convertedVal);
        submitButton.prop("disabled", false);
      }

      $("#dol_val").on("input change", updateWithdrawConversion);

      // When a withdrawal button is clicked…
      $(".withdraw").on("click", function() {
        let resourceStr = $(this).attr("data-resource");
        let withdrawMethod = JSON.parse(resourceStr);
        let targetCurrency = withdrawMethod.wallet_short;
        $("input[name='currency']").val(targetCurrency);
        $("#withdrawModalLabel").text("Withdraw Via " + withdrawMethod.wallet_name);
        // Store the wallet limits on the modal for later validation
        $("#withdrawModal").data("walletMin", withdrawMethod.wallet_min);
        $("#withdrawModal").data("walletMax", withdrawMethod.wallet_max);
        // Reset the form
        $("#withdrawForm")[0].reset();
      });

      // When the withdrawal form is submitted…
      $("#withdrawForm").on("submit", function(e) {
        e.preventDefault();
        const submitButton = $(this).find("button[type='submit']");
        submitButton.prop("disabled", true).text("Processing...");

        // Get and parse the available balance (strip any non-numeric chars)
        let availableBalance = parseFloat($("#balance").val().replace(/[^0-9.]/g, ''));
        // Get the withdrawal amount entered
        let withdrawAmount = parseFloat($(this).find("input[name='dol_val']").val());

        // Validate sufficient balance
        if (withdrawAmount > availableBalance) {
          notify("error", "Insufficient balance to withdraw that amount.");
          submitButton.prop("disabled", false).text("Confirm");
          return;
        }

        // Retrieve the wallet limits stored on the modal
        let minWithdrawal = parseFloat($("#withdrawModal").data("walletMin"));
        let maxWithdrawal = parseFloat($("#withdrawModal").data("walletMax"));

        // Validate against wallet limits
        if (withdrawAmount < minWithdrawal) {
          notify("error", "Withdrawal amount cannot be less than " + minWithdrawal + " USD");
          submitButton.prop("disabled", false).text("Confirm");
          return;
        } else if (withdrawAmount > maxWithdrawal) {
          notify("error", "Withdrawal amount cannot exceed " + maxWithdrawal + " USD");
          submitButton.prop("disabled", false).text("Confirm");
          return;
        }

        // Get form values
        let currency = $(this).find("input[name='currency']").val();
        let type = $(this).find("input[name='type']").val();
        let address = $(this).find("input[name='address']").val();
        let amount = $(this).find("input[name='amount']").val(); // converted amount

        $.ajax({
          type: "POST",
          url: "../backend/actions/withdraw.php",
          data: {
            amount: amount,
            dol_val: withdrawAmount,
            currency: currency,
            type: type,
            address: address
          },
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              notify("success", response.message);
              $("#withdrawForm")[0].reset();
              $('#withdrawModal').modal("hide");
              window.setTimeout(() => {
                window.location.href = "./preview/index.php?" +
                  "address=" + encodeURIComponent(address) +
                  "&currency=" + encodeURIComponent(currency) +
                  "&usd=" + encodeURIComponent(withdrawAmount) +
                  "&converted=" + encodeURIComponent(amount);
              }, 1500);
            } else {
              notify("error", response.message);
            }
            submitButton.prop("disabled", false).text("Confirm");
          },
          error: function(xhr, status, error) {
            notify("error", "Error: " + error);
            submitButton.prop("disabled", false).text("Confirm");
          }
        });
      });

      // When any modal is hidden, reset its form and conversion fields
      $('#withdrawModal, #exampleModal').on("hidden.bs.modal", function() {
        let form = $(this).find("form");
        if (form.length) {
          form[0].reset();
        }
        $(this).find("#convertedAmount").text("0");
        $(this).find("#convertedAmountInput").val("");
      });
    });
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