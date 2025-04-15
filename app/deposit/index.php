<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

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
              <a href="/crest/app/deposit/history" class="btn cmn-btn">
                Deposit History
              </a>
            </div>
          </div>

          <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card">
              <div class="card-body b-primary">
                <div class="row justify-content-center">
                  <div class="col-md-5 col-sm-12">
                    <img src="https://assetbase-trading.com/assets/images/gateway/6133c91c170d51630783772.png" class="card-img-top w-100" alt="Bitcoin">
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <ul class="list-group text-center">


                      <li class="list-group-item">
                        Bitcoin</li>

                      <li class="list-group-item">Limit : 100
                        - 1000000 USD</li>

                      <li class="list-group-item"> Charge - 0 USD
                        + 0%
                      </li>

                      <li class="list-group-item">
                        <button type="button" data-id="1" data-resource="{&quot;id&quot;:1,&quot;name&quot;:&quot;Bitcoin&quot;,&quot;currency&quot;:&quot;USD&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1000,&quot;gateway_alias&quot;:&quot;bitcoin&quot;,&quot;min_amount&quot;:&quot;100.00000000&quot;,&quot;max_amount&quot;:&quot;1000000.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:&quot;6133c91c170d51630783772.png&quot;,&quot;gateway_parameter&quot;:&quot;{\&quot;payment_proof\&quot;:{\&quot;field_name\&quot;:\&quot;payment_proof\&quot;,\&quot;field_level\&quot;:\&quot;Payment Proof\&quot;,\&quot;type\&quot;:\&quot;text\&quot;,\&quot;validation\&quot;:\&quot;required\&quot;}}&quot;,&quot;created_at&quot;:&quot;2021-09-04T14:29:33.000000Z&quot;,&quot;updated_at&quot;:&quot;2025-02-15T00:41:38.000000Z&quot;,&quot;method&quot;:{&quot;id&quot;:32,&quot;code&quot;:&quot;1000&quot;,&quot;alias&quot;:&quot;bitcoin&quot;,&quot;image&quot;:&quot;6133c91c170d51630783772.png&quot;,&quot;name&quot;:&quot;Bitcoin&quot;,&quot;status&quot;:true,&quot;parameters&quot;:&quot;[]&quot;,&quot;supported_currencies&quot;:&quot;[]&quot;,&quot;crypto&quot;:0,&quot;extra&quot;:null,&quot;description&quot;:&quot;bc1q8kgs7amrmdre4z3y4vylaud5380rgx3wd06u2a&quot;,&quot;input_form&quot;:{&quot;payment_proof&quot;:{&quot;field_name&quot;:&quot;payment_proof&quot;,&quot;field_level&quot;:&quot;Payment Proof&quot;,&quot;type&quot;:&quot;text&quot;,&quot;validation&quot;:&quot;required&quot;}},&quot;created_at&quot;:&quot;2021-09-04T14:29:32.000000Z&quot;,&quot;updated_at&quot;:&quot;2025-02-15T00:41:16.000000Z&quot;}}"
                          data-base_symbol=""
                          class=" btn deposit cmn-btn w-100" data-toggle="modal" data-target="#exampleModal">
                          Deposit</button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card">
              <div class="card-body b-primary">
                <div class="row justify-content-center">
                  <div class="col-md-5 col-sm-12">
                    <img src="https://assetbase-trading.com/assets/images/gateway/614af5fcd3f291632302588.png" class="card-img-top w-100" alt="Ethereum">
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <ul class="list-group text-center">


                      <li class="list-group-item">
                        Ethereum</li>

                      <li class="list-group-item">Limit : 100
                        - 1000000 USD</li>

                      <li class="list-group-item"> Charge - 0 USD
                        + 0%
                      </li>

                      <li class="list-group-item">
                        <button type="button" data-id="2" data-resource="{&quot;id&quot;:2,&quot;name&quot;:&quot;Ethereum&quot;,&quot;currency&quot;:&quot;$&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1001,&quot;gateway_alias&quot;:&quot;ethereum&quot;,&quot;min_amount&quot;:&quot;100.00000000&quot;,&quot;max_amount&quot;:&quot;1000000.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:&quot;614af5fcd3f291632302588.png&quot;,&quot;gateway_parameter&quot;:&quot;{\&quot;payment_proof\&quot;:{\&quot;field_name\&quot;:\&quot;payment_proof\&quot;,\&quot;field_level\&quot;:\&quot;Payment Proof\&quot;,\&quot;type\&quot;:\&quot;file\&quot;,\&quot;validation\&quot;:\&quot;required\&quot;}}&quot;,&quot;created_at&quot;:&quot;2021-09-22T09:23:09.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-02-20T10:31:09.000000Z&quot;,&quot;method&quot;:{&quot;id&quot;:33,&quot;code&quot;:&quot;1001&quot;,&quot;alias&quot;:&quot;ethereum&quot;,&quot;image&quot;:&quot;614af5fcd3f291632302588.png&quot;,&quot;name&quot;:&quot;Ethereum&quot;,&quot;status&quot;:true,&quot;parameters&quot;:&quot;[]&quot;,&quot;supported_currencies&quot;:&quot;[]&quot;,&quot;crypto&quot;:0,&quot;extra&quot;:null,&quot;description&quot;:&quot;0xCdaAab960E93968F3Acab578FB1a9246Ccb2859e&quot;,&quot;input_form&quot;:{&quot;payment_proof&quot;:{&quot;field_name&quot;:&quot;payment_proof&quot;,&quot;field_level&quot;:&quot;Payment Proof&quot;,&quot;type&quot;:&quot;file&quot;,&quot;validation&quot;:&quot;required&quot;}},&quot;created_at&quot;:&quot;2021-09-22T09:23:09.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-02-20T10:31:08.000000Z&quot;}}"
                          data-base_symbol=""
                          class=" btn deposit cmn-btn w-100" data-toggle="modal" data-target="#exampleModal">
                          Deposit</button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card">
              <div class="card-body b-primary">
                <div class="row justify-content-center">
                  <div class="col-md-5 col-sm-12">
                    <img src="https://assetbase-trading.com/assets/images/gateway/636ba134bccc51667998004.png" class="card-img-top w-100" alt="USDT(TRC20)">
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <ul class="list-group text-center">


                      <li class="list-group-item">
                        USDT(TRC20)</li>

                      <li class="list-group-item">Limit : 100
                        - 1000000 USD</li>

                      <li class="list-group-item"> Charge - 0 USD
                        + 0%
                      </li>

                      <li class="list-group-item">
                        <button type="button" data-id="4" data-resource="{&quot;id&quot;:4,&quot;name&quot;:&quot;USDT(TRC20)&quot;,&quot;currency&quot;:&quot;$&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1003,&quot;gateway_alias&quot;:&quot;usdt(trc20)&quot;,&quot;min_amount&quot;:&quot;100.00000000&quot;,&quot;max_amount&quot;:&quot;1000000.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:&quot;636ba134bccc51667998004.png&quot;,&quot;gateway_parameter&quot;:&quot;{\&quot;payment_proof\&quot;:{\&quot;field_name\&quot;:\&quot;payment_proof\&quot;,\&quot;field_level\&quot;:\&quot;Payment Proof\&quot;,\&quot;type\&quot;:\&quot;text\&quot;,\&quot;validation\&quot;:\&quot;required\&quot;}}&quot;,&quot;created_at&quot;:&quot;2021-09-22T09:31:39.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-11-21T19:32:36.000000Z&quot;,&quot;method&quot;:{&quot;id&quot;:35,&quot;code&quot;:&quot;1003&quot;,&quot;alias&quot;:&quot;usdt(trc20)&quot;,&quot;image&quot;:&quot;636ba134bccc51667998004.png&quot;,&quot;name&quot;:&quot;USDT(TRC20)&quot;,&quot;status&quot;:true,&quot;parameters&quot;:&quot;[]&quot;,&quot;supported_currencies&quot;:&quot;[]&quot;,&quot;crypto&quot;:0,&quot;extra&quot;:null,&quot;description&quot;:&quot;TFEzH8kZz2Wp6zg1xQsYDrZwaTiTFLntbp&quot;,&quot;input_form&quot;:{&quot;payment_proof&quot;:{&quot;field_name&quot;:&quot;payment_proof&quot;,&quot;field_level&quot;:&quot;Payment Proof&quot;,&quot;type&quot;:&quot;text&quot;,&quot;validation&quot;:&quot;required&quot;}},&quot;created_at&quot;:&quot;2021-09-22T09:31:39.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-11-21T19:32:36.000000Z&quot;}}"
                          data-base_symbol=""
                          class=" btn deposit cmn-btn w-100" data-toggle="modal" data-target="#exampleModal">
                          Deposit</button>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
            <div class="card">
              <div class="card-body b-primary">
                <div class="row justify-content-center">
                  <div class="col-md-5 col-sm-12">
                    <img src="https://assetbase-trading.com/assets/images/gateway/614af8b9220dc1632303289.png" class="card-img-top w-100" alt="Dogecoin">
                  </div>
                  <div class="col-md-7 col-sm-12">
                    <ul class="list-group text-center">


                      <li class="list-group-item">
                        Dogecoin</li>

                      <li class="list-group-item">Limit : 800
                        - 1000000 USD</li>

                      <li class="list-group-item"> Charge - 0 USD
                        + 0%
                      </li>

                      <li class="list-group-item">
                        <button type="button" data-id="5" data-resource="{&quot;id&quot;:5,&quot;name&quot;:&quot;Dogecoin&quot;,&quot;currency&quot;:&quot;$&quot;,&quot;symbol&quot;:&quot;&quot;,&quot;method_code&quot;:1004,&quot;gateway_alias&quot;:&quot;dogecoin&quot;,&quot;min_amount&quot;:&quot;800.00000000&quot;,&quot;max_amount&quot;:&quot;1000000.00000000&quot;,&quot;percent_charge&quot;:&quot;0.00&quot;,&quot;fixed_charge&quot;:&quot;0.00000000&quot;,&quot;rate&quot;:&quot;1.00000000&quot;,&quot;image&quot;:&quot;614af8b9220dc1632303289.png&quot;,&quot;gateway_parameter&quot;:&quot;{\&quot;payment_proof\&quot;:{\&quot;field_name\&quot;:\&quot;payment_proof\&quot;,\&quot;field_level\&quot;:\&quot;Payment Proof\&quot;,\&quot;type\&quot;:\&quot;file\&quot;,\&quot;validation\&quot;:\&quot;required\&quot;}}&quot;,&quot;created_at&quot;:&quot;2021-09-22T09:34:49.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-02-20T10:30:56.000000Z&quot;,&quot;method&quot;:{&quot;id&quot;:36,&quot;code&quot;:&quot;1004&quot;,&quot;alias&quot;:&quot;dogecoin&quot;,&quot;image&quot;:&quot;614af8b9220dc1632303289.png&quot;,&quot;name&quot;:&quot;Dogecoin&quot;,&quot;status&quot;:true,&quot;parameters&quot;:&quot;[]&quot;,&quot;supported_currencies&quot;:&quot;[]&quot;,&quot;crypto&quot;:0,&quot;extra&quot;:null,&quot;description&quot;:&quot;DBMRuqJqhLpNudChSi5sgSuUeSfRWwpxhX&quot;,&quot;input_form&quot;:{&quot;payment_proof&quot;:{&quot;field_name&quot;:&quot;payment_proof&quot;,&quot;field_level&quot;:&quot;Payment Proof&quot;,&quot;type&quot;:&quot;file&quot;,&quot;validation&quot;:&quot;required&quot;}},&quot;created_at&quot;:&quot;2021-09-22T09:34:49.000000Z&quot;,&quot;updated_at&quot;:&quot;2024-02-20T10:30:56.000000Z&quot;}}"
                          data-base_symbol=""
                          class=" btn deposit cmn-btn w-100" data-toggle="modal" data-target="#exampleModal">
                          Deposit</button>
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
                <input type="hidden" name="currency" class="edit-currency" value="">
                <input type="hidden" name="type" value="deposit">
                <input type="hidden" name="address" value="2x0sahda89b3w8ewjd9x73vxhs">
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
                <small style="float: right;" id="convertedAmount">0</small>
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
        $("#depositForm")[0].reset();
        $("#convertedAmount").text("0");
        $("#convertedAmountInput").val("");
      });

      // When a deposit button is clicked...
      $(".deposit").on("click", function() {
        let resourceStr = $(this).attr("data-resource");
        let depositMethod = JSON.parse(resourceStr);
        let alias = depositMethod.gateway_alias.toLowerCase();
        const currencyMapping = {
          "bitcoin": "BTC",
          "ethereum": "ETH",
          "usdt(trc20)": "USDT",
          "dogecoin": "DOGE"
        };
        let targetCurrency = currencyMapping[alias] || alias.toUpperCase();
        $("input[name='currency']").val(targetCurrency);
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
        if (isNaN(amountVal) || amountVal === "") {
          $("#convertedAmount").text("");
          $("#convertedAmountInput").val("");
          return;
        }
        let targetCurrency = $("input[name='currency']").val() || "USD";

        // Show loading text and disable the Next button while fetching conversion
        $("#convertedAmount").text("...");
        const submitButton = $("#depositForm button[type='submit']");
        submitButton.prop("disabled", true);

        const convertedVal = await convert("USD", targetCurrency, amountVal);

        $("#convertedAmount").text(convertedVal + " " + targetCurrency);
        // Update the hidden field with the converted amount
        $("#convertedAmountInput").val(convertedVal);
        submitButton.prop("disabled", false);
      });

      $("#depositForm").on("submit", function(e) {
        e.preventDefault();
        const submitButton = $(this).find('button[type="submit"]');
        submitButton.prop('disabled', true).text("Processing...");

        // Get values from the form
        var dol_val = $(this).find("input[name='amount']").val();
        var currency = $(this).find("input[name='currency']").val();
        var type = $(this).find("input[name='type']").val();
        var address = $(this).find("input[name='address']").val();
        var converted_amount = $(this).find("input[name='converted_amount']").val();

        $.ajax({
          type: "POST",
          url: "../backend/actions/deposit.php",
          data: {
            dol_val: dol_val,
            currency: currency,
            type: type,
            address: address,
            // Pass the converted amount under a parameter name of your choosing
            amount: converted_amount
          },
          dataType: "json",
          success: function(response) {
            if (response.status === "success") {
              notify("success", response.message);
              // Redirect to the preview page with all necessary parameters (URL encoded)
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