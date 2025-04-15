<!DOCTYPE html>
<html lang="en">

<?php include "../../master/head.php"; ?>
<!-- Include the QRCodeJS library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<head>
  <title>Crest Asset-Trading - Withdrawal Preview</title>
  <style>
    .copy-input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
    }

    #qrcode {
      margin-top: 20px;
    }
  </style>
</head>

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
            <h2 class="page-title">Withdrawal Preview</h2>
            <ul class="page-breadcrumb">
              <li><a href="https://assetbase-trading.com">User</a></li>
              <li>Withdrawal Preview</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->

    <section class="cmn-section">
      <div class="container">
        <h2>Withdrawal Preview</h2>
        <?php
        // Retrieve parameters from the URL
        $address = isset($_GET['address']) ? htmlspecialchars($_GET['address']) : "N/A";
        $currency = isset($_GET['currency']) ? htmlspecialchars($_GET['currency']) : "N/A";
        $usdVal = isset($_GET['usd']) ? htmlspecialchars($_GET['usd']) : "N/A";
        $converted = isset($_GET['converted']) ? htmlspecialchars($_GET['converted']) : "N/A";
        ?>
        <div class="deposit-details">
          <p><strong>Your Address:</strong></p>
          <input type="text" id="depositAddress" class="copy-input" value="<?php echo $address; ?>" readonly>
          <button onclick="copyAddress()" class="btn btn-secondary">Copy Address</button>
          <p><strong>Currency:</strong> <?php echo $currency; ?></p>
          <p><strong>Amount:</strong> <?php echo $converted . " " . $currency; ?></p>
          <p><strong>Amount (USD):</strong> <?php echo $usdVal; ?></p>
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

  <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

  <script>
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
    "use strict";

    // Function to copy the deposit address
    function copyAddress() {
      var copyText = document.getElementById("depositAddress");
      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices
      document.execCommand("copy");
      alert("Copied the address: " + copyText.value);
    }
  </script>
</body>

</html>