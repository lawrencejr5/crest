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

          <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card card-deposit b-primary">
              <div class="card-body card-body-deposit">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <img src="https://assetbase-trading.com/assets/images/withdraw/method/6133389eb75251630746782.png" class="card-img-top w-100" alt="Bitcoin">
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <ul class="list-group text-center">
                      <li class="list-group-item">
                        Bitcoin</li>
                      <li class="list-group-item">Limit : 10
                        - 1000000 USD</li>

                      <li class="list-group-item"> Charge - 0 USD
                        + 0%
                      </li>

                      <li class="list-group-item">
                        <a href="javascript:void(0)" data-id="1"
                          data-resource="{&quot;id&quot;:1,&quot;name&quot;:&quot;Bitcoin&quot;,&quot;image&quot;:&quot;6133389eb75251630746782.png&quot;,&quot;min_limit&quot;:&quot;10.00000000&quot;,&quot;max_limit&quot;:&quot;1000000.00000000&quot;,&quot;delay&quot;:&quot;24hrs&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;currency&quot;:&quot;USD&quot;,&quot;user_data&quot;:{&quot;wallet_address&quot;:{&quot;field_name&quot;:&quot;wallet_address&quot;,&quot;field_level&quot;:&quot;Wallet Address&quot;,&quot;type&quot;:&quot;textarea&quot;,&quot;validation&quot;:&quot;required&quot;}},&quot;description&quot;:&quot;&lt;span style=\&quot;color: rgb(33, 37, 41);\&quot;&gt;Kindly input your wallet address below to process your withdrawal!&lt;\/span&gt;&lt;br&gt;&lt;span style=\&quot;color: rgb(33, 37, 41);\&quot;&gt;&lt;i&gt;&lt;b&gt;please input the correct as we won&#039;t be responsible for payment failure due to wrong wallet address.&lt;\/b&gt;&lt;\/i&gt;&lt;\/span&gt;&lt;br&gt;&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;2021-09-04T04:13:03.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-11-09T07:47:13.000000Z&quot;}"
                          class="btn btn-block  cmn-btn withdraw" data-toggle="modal" data-target="#withdrawModal">
                          Withdraw Now</a>
                      </li>
                    </ul>
                  </div>
                </div>


              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card card-deposit b-primary">
              <div class="card-body card-body-deposit">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <img src="https://assetbase-trading.com/assets/images/withdraw/method/636ba1dcf40631667998172.png" class="card-img-top w-100" alt="Ethereum">
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <ul class="list-group text-center">
                      <li class="list-group-item">
                        Ethereum</li>
                      <li class="list-group-item">Limit : 10
                        - 100000000 USD</li>

                      <li class="list-group-item"> Charge - 0 USD
                        + 0%
                      </li>

                      <li class="list-group-item">
                        <a href="javascript:void(0)" data-id="2"
                          data-resource="{&quot;id&quot;:2,&quot;name&quot;:&quot;Ethereum&quot;,&quot;image&quot;:&quot;636ba1dcf40631667998172.png&quot;,&quot;min_limit&quot;:&quot;10.00000000&quot;,&quot;max_limit&quot;:&quot;100000000.00000000&quot;,&quot;delay&quot;:&quot;24hrs&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;currency&quot;:&quot;USD&quot;,&quot;user_data&quot;:{&quot;wallet_address&quot;:{&quot;field_name&quot;:&quot;wallet_address&quot;,&quot;field_level&quot;:&quot;Wallet Address&quot;,&quot;type&quot;:&quot;text&quot;,&quot;validation&quot;:&quot;required&quot;}},&quot;description&quot;:&quot;&lt;span style=\&quot;color: rgb(33, 37, 41);\&quot;&gt;Kindly input your wallet address below to process your withdrawal!&lt;\/span&gt;&lt;br&gt;&lt;span style=\&quot;color: rgb(33, 37, 41);\&quot;&gt;&lt;i&gt;&lt;span style=\&quot;font-weight: bolder;\&quot;&gt;please input the correct as we won&#039;t be responsible for payment failure due to wrong wallet address.&lt;\/span&gt;&lt;\/i&gt;&lt;\/span&gt;&lt;br&gt;&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;2022-11-09T07:49:33.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-11-09T07:49:43.000000Z&quot;}"
                          class="btn btn-block  cmn-btn withdraw" data-toggle="modal" data-target="#withdrawModal">
                          Withdraw Now</a>
                      </li>
                    </ul>
                  </div>
                </div>


              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card card-deposit b-primary">
              <div class="card-body card-body-deposit">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <img src="https://assetbase-trading.com/assets/images/withdraw/method/636ba213ced641667998227.png" class="card-img-top w-100" alt="Doge">
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <ul class="list-group text-center">
                      <li class="list-group-item">
                        Doge</li>
                      <li class="list-group-item">Limit : 10
                        - 100000000 USD</li>

                      <li class="list-group-item"> Charge - 0 USD
                        + 0%
                      </li>

                      <li class="list-group-item">
                        <a href="javascript:void(0)" data-id="3"
                          data-resource="{&quot;id&quot;:3,&quot;name&quot;:&quot;Doge&quot;,&quot;image&quot;:&quot;636ba213ced641667998227.png&quot;,&quot;min_limit&quot;:&quot;10.00000000&quot;,&quot;max_limit&quot;:&quot;100000000.00000000&quot;,&quot;delay&quot;:&quot;24hrs&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;currency&quot;:&quot;USD&quot;,&quot;user_data&quot;:{&quot;wallet_address&quot;:{&quot;field_name&quot;:&quot;wallet_address&quot;,&quot;field_level&quot;:&quot;Wallet Address&quot;,&quot;type&quot;:&quot;text&quot;,&quot;validation&quot;:&quot;required&quot;}},&quot;description&quot;:&quot;&lt;span style=\&quot;color: rgb(33, 37, 41);\&quot;&gt;Kindly input your wallet address below to process your withdrawal!&lt;\/span&gt;&lt;br&gt;&lt;span style=\&quot;color: rgb(33, 37, 41);\&quot;&gt;&lt;i&gt;&lt;span style=\&quot;font-weight: bolder;\&quot;&gt;please input the correct as we won&#039;t be responsible for payment failure due to wrong wallet address.&lt;\/span&gt;&lt;\/i&gt;&lt;\/span&gt;&lt;br&gt;&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;2022-11-09T07:50:28.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-11-09T07:50:28.000000Z&quot;}"
                          class="btn btn-block  cmn-btn withdraw" data-toggle="modal" data-target="#withdrawModal">
                          Withdraw Now</a>
                      </li>
                    </ul>
                  </div>
                </div>


              </div>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card card-deposit b-primary">
              <div class="card-body card-body-deposit">
                <div class="row">
                  <div class="col-md-5 col-sm-12">
                    <img src="https://assetbase-trading.com/assets/images/withdraw/method/636ba244144be1667998276.png" class="card-img-top w-100" alt="USDT(TRC20)">
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <ul class="list-group text-center">
                      <li class="list-group-item">
                        USDT(TRC20)</li>
                      <li class="list-group-item">Limit : 10
                        - 100000000 USD</li>

                      <li class="list-group-item"> Charge - 0 USD
                        + 0%
                      </li>

                      <li class="list-group-item">
                        <a href="javascript:void(0)" data-id="4"
                          data-resource="{&quot;id&quot;:4,&quot;name&quot;:&quot;USDT(TRC20)&quot;,&quot;image&quot;:&quot;636ba244144be1667998276.png&quot;,&quot;min_limit&quot;:&quot;10.00000000&quot;,&quot;max_limit&quot;:&quot;100000000.00000000&quot;,&quot;delay&quot;:&quot;24hrs&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;currency&quot;:&quot;USD&quot;,&quot;user_data&quot;:{&quot;wallet_address&quot;:{&quot;field_name&quot;:&quot;wallet_address&quot;,&quot;field_level&quot;:&quot;Wallet Address&quot;,&quot;type&quot;:&quot;text&quot;,&quot;validation&quot;:&quot;required&quot;}},&quot;description&quot;:&quot;&lt;span style=\&quot;color: rgb(33, 37, 41);\&quot;&gt;Kindly input your wallet address below to process your withdrawal!&lt;\/span&gt;&lt;br&gt;&lt;span style=\&quot;color: rgb(33, 37, 41);\&quot;&gt;&lt;i&gt;&lt;span style=\&quot;font-weight: bolder;\&quot;&gt;please input the correct as we won&#039;t be responsible for payment failure due to wrong wallet address.&lt;\/span&gt;&lt;\/i&gt;&lt;\/span&gt;&lt;br&gt;&quot;,&quot;status&quot;:1,&quot;created_at&quot;:&quot;2022-11-09T07:51:16.000000Z&quot;,&quot;updated_at&quot;:&quot;2022-11-09T07:51:16.000000Z&quot;}"
                          class="btn btn-block  cmn-btn withdraw" data-toggle="modal" data-target="#withdrawModal">
                          Withdraw Now</a>
                      </li>
                    </ul>
                  </div>
                </div>


              </div>
            </div>
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
              <small style="float: right;" id="convertedAmount">0</small>
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
    (function($) {
      "use strict";
      $(document).ready(function() {
        $('.deposit').on('click', function() {
          var result = $(this).data('resource');

          $('.method-name').text(`Withdraw Via  ${result.name}`);


          $('.edit-method-code').val(result.id);
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

  <script>
    "use strict";
    $(document).ready(function() {

      const currencyMapping = {
        "bitcoin": "BTC",
        "ethereum": "ETH",
        "usdt(trc20)": "USDT",
        "dogecoin": "DOGE"
      };

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
        if (isNaN(usdVal) || usdVal === "") {
          $("#convertedAmount").text("0");
          $("#convertedAmountInput").val("0");
          return;
        }
        // Retrieve raw currency string and convert to three-letter format
        let rawCurrency = $("input[name='currency']").val() || "USD";
        let targetCurrency = currencyMapping[rawCurrency.toLowerCase()] || rawCurrency.toUpperCase();

        // Show loading text and disable button during conversion
        $("#convertedAmount").text("...");
        const submitButton = $("#depositForm button[type='submit'], #withdrawForm button[type='submit']");
        submitButton.prop("disabled", true);

        const convertedVal = await convert("USD", targetCurrency, usdVal);
        let displayText = convertedVal + " " + targetCurrency;
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
        let alias = withdrawMethod.name ? withdrawMethod.name.toLowerCase() : withdrawMethod.gateway_alias.toLowerCase();
        let targetCurrency = alias.toUpperCase();
        // Update the hidden currency field and modal title
        $("input[name='currency']").val(targetCurrency);
        $("#withdrawModalLabel").text("Withdraw Via " + targetCurrency);
        // Reset the form
        $("#withdrawForm")[0].reset();
      });

      // When the withdrawal form is submitted…
      $("#withdrawForm").on("submit", function(e) {
        e.preventDefault();
        const submitButton = $(this).find('button[type="submit"]');
        submitButton.prop('disabled', true).text("Processing...");

        // Get form values
        var amount = $(this).find("input[name='amount']").val();
        var currency = $(this).find("input[name='currency']").val();
        var type = $(this).find("input[name='type']").val();
        var address = $(this).find("input[name='address']").val();
        var dol_val = $(this).find("input[name='dol_val']").val();

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

      // When the deposit form is submitted…
      $("#depositForm").on("submit", function(e) {
        e.preventDefault();
        const submitButton = $(this).find('button[type="submit"]');
        submitButton.prop('disabled', true).text("Processing...");

        // Get the USD value (dol_val) and the converted value (amount)
        var dol_val = $(this).find("input[name='amount']").val();
        var converted_amount = $(this).find("input[name='converted_amount']").val();
        var currency = $(this).find("input[name='currency']").val();
        var type = $(this).find("input[name='type']").val();
        var address = $(this).find("input[name='address']").val();

        $.ajax({
          type: "POST",
          url: "../backend/actions/deposit.php",
          data: {
            dol_val: dol_val,
            amount: converted_amount,
            currency: currency,
            type: type,
            address: address
          },
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              notify("success", response.message);
              // Redirect to preview page or handle success accordingly
              window.location.href = "../deposit/preview/index.php?" +
                "address=" + encodeURIComponent(address) +
                "&currency=" + encodeURIComponent(currency) +
                "&usd=" + encodeURIComponent(dol_val) +
                "&converted=" + encodeURIComponent(converted_amount);
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