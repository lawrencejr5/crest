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
              <li><a href="./">User</a></li>
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

      // Function to update the conversion result
      async function updateConversion() {
        let usdVal = $("#dol_val").val();
        // Retrieve raw currency string and convert to three-letter format
        let rawCurrency = $("input[name='currency']").val() || "USD";
        let targetCurrency = rawCurrency;

        if (isNaN(usdVal) || usdVal === "") {
          $("#convertedAmount").text(`You will receive 0 ${targetCurrency}`);
          $("#convertedAmountInput").val("0");
          return;
        }


        // Show loading text and disable button during conversion
        $("#convertedAmount").text("...");
        const submitButton = $("#depositForm button[type='submit'], #withdrawForm button[type='submit']");
        submitButton.prop("disabled", true);

        const convertedVal = await convert("USD", targetCurrency, usdVal);
        let displayText = `You will receive ${convertedVal} ${targetCurrency}`;
        $("#convertedAmount").text(displayText);
        // Set only the number (without currency) in the hidden field
        $("#convertedAmountInput").val(convertedVal);
        submitButton.prop("disabled", false);
      }

      // Bind updateConversion to both input and change events for #dol_val
      $("#dol_val").on("input", updateConversion);
      $("#dol_val").on("change", updateConversion);

      // When any modal is hidden, reset its form and conversion fields
      $('#withdrawModal, #exampleModal').on('hidden.bs.modal', function() {
        let form = $(this).find('form');
        if (form.length) {
          form[0].reset();
        }
        $(this).find("#convertedAmount").text("0");
        $(this).find("#convertedAmountInput").val("");
      });

      // When a withdrawal button is clicked…
      $(".withdraw").on("click", function() {
        let resourceStr = $(this).attr('data-resource');
        let withdrawMethod = JSON.parse(resourceStr);
        // Use the method name or alias – adjust as needed
        let targetCurrency = withdrawMethod.wallet_short;
        // Update the hidden currency field and modal title
        $("input[name='currency']").val(targetCurrency);
        $("#withdrawModalLabel").text("Withdraw Via " + withdrawMethod.wallet_name);
        // Reset the form
        $("#withdrawForm")[0].reset();
      });

      // When the withdrawal form is submitted…
      $("#withdrawForm").on("submit", function(e) {
        e.preventDefault();
        const submitButton = $(this).find('button[type="submit"]');
        submitButton.prop('disabled', true).text("Processing...");

        // Get form values
        let dol_val = $(this).find("input[name='dol_val']").val();
        let currency = $(this).find("input[name='currency']").val();
        let type = $(this).find("input[name='type']").val();
        let address = $(this).find("input[name='address']").val();
        let amount = $(this).find("input[name='amount']").val();

        $.ajax({
          type: "POST",
          url: "../backend/actions/withdraw.php",
          data: {
            amount: amount,
            dol_val: dol_val,
            currency: currency,
            type: type,
            address: address
          },
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              notify("success", response.message);
              $("#withdrawForm")[0].reset();
              $('#withdrawModal').modal('hide');

              window.setTimeout(() => {
                window.location.href = "./preview/index.php?" +
                  "address=" + encodeURIComponent(address) +
                  "&currency=" + encodeURIComponent(currency) +
                  "&usd=" + encodeURIComponent(dol_val) +
                  "&converted=" + encodeURIComponent(amount);
              }, 1500)
            } else {
              notify("error", response.message);
            }
            submitButton.prop('disabled', false).text("Confirm");
          },
          error: function(xhr, status, error) {
            notify("error", "Error: " + error);
            submitButton.prop('disabled', false).text("Confirm");
          }
        });
      });

      // When any modal (e.g., #withdrawModal or #exampleModal) is hidden, reset its form and converted amount
      $('#withdrawModal, #exampleModal').on('hidden.bs.modal', function() {
        // Reset the form (if there's a form inside the modal)
        let form = $(this).find('form');
        if (form.length) {
          form[0].reset();
        }
        // Clear the displayed converted amount text (if exists)
        $(this).find("#convertedAmount").text("0");
        // Clear the hidden input storing converted amount (if exists)
        $(this).find("#convertedAmountInput").val("");
      });
    });
  </script>

</body>

</html>

</body>

</html>