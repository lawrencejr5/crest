<!DOCTYPE html>
<html lang="en">

<?php include "../../backend/udata.php" ?>
<?php include "../../master/head.php"; ?>
<!-- Include the QRCodeJS library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<head>
  <title>Deposit Preview</title>
  <style>
    .copy-input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
    }

    #qrcode {
      margin-top: 20px;
    }


    /* Main Content Section for Deposit Preview */
    .cmn-section {
      padding-top: 60px;
      padding-bottom: 60px;
    }

    .preview-container h2 {
      color: #fff;
      margin-bottom: 30px;
      text-align: center;
      font-size: 2rem;
    }

    .deposit-details {
      background-color: #222;
      color: #f8f9fa;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      max-width: 600px;
      margin: 0 auto;
    }

    .deposit-details p {
      margin-bottom: 15px;
      font-size: 1rem;
    }

    .deposit-details strong {
      color: #b58e43;
      /* Highlight important labels */
      margin-right: 5px;
    }

    .copy-input {
      width: calc(100% - 90px);
      /* Adjust width for the button */
      padding: 12px;
      font-size: 1rem;
      background-color: #2b3a4c;
      color: #f8f9fa;
      border: 1px solid #3a506b;
      border-radius: 5px;
      margin-bottom: 15px;
      box-sizing: border-box;
    }

    .btn.btn-secondary {
      background-color: #6c757d;
      color: #fff;
      border: none;
      padding: 12px 20px;
      font-size: 1rem;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
      margin-left: 10px;
    }

    .btn.back-btn {
      background-color: #b58e43;
      border: none;
      outline: none;
      width: 100%;
      margin-top: 20px;
    }

    .btn.btn-secondary:hover {
      background-color: #545b62;
    }

    #qrcode {
      margin-top: 25px;
      text-align: center;
      background-color: #fff;
      /* Ensure QR code is visible on dark background */
      padding: 10px;
      border-radius: 5px;
      display: inline-block;
      /* To contain the QR code size */
    }

    #qrcode canvas {
      display: block;
      /* Prevent extra bottom spacing */
    }

    .imagePreview {
      background-position: center;
      background-repeat: no-repeat;
      width: 180px;
      height: 180px;
      border-radius: 50%;
      background-size: cover;
      border: 2px solid #ddd;
      margin: 1rem 0;
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 767.98px) {

      .deposit-details {
        padding: 20px;
      }

      .copy-input {
        width: calc(100% - 10px);
        /* Full width on smaller screens */
        margin-right: 0;
        margin-bottom: 10px;
      }

      .btn.btn-secondary {
        width: 100%;
        margin-left: 0;
      }

      #qrcode {
        margin-top: 20px;
      }
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

  <!-- STAR ANIMATION -->
  <div class="bg-animation" style="z-index: -5;">
    <div id='stars'></div>
    <div id='stars2'></div>
    <div id='stars3'></div>
    <div id='stars4'></div>
  </div>
  <!-- / STAR ANIMATION -->
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
              <li>Deposit Preview</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->

    <section class="cmn-section">
      <div class="container preview-container">
        <?php
        // Retrieve parameters from the URL
        $address = isset($_GET['address']) ? htmlspecialchars($_GET['address']) : "N/A";
        $currency = isset($_GET['currency']) ? htmlspecialchars($_GET['currency']) : "N/A";
        $usdVal = isset($_GET['usd']) ? htmlspecialchars($_GET['usd']) : "N/A";
        $converted = isset($_GET['converted']) ? htmlspecialchars($_GET['converted']) : "N/A";
        ?>
        <div class="deposit-details">
          <p><strong>Deposit Address:</strong></p>
          <input type="text" id="depositAddress" class="copy-input" value="<?php echo $address; ?>" readonly>
          <button onclick="copyAddress()" class="btn btn-secondary">Copy Address</button>
          <p><strong>Currency:</strong> <?php echo $currency; ?></p>
          <p><strong>Amount (USD):</strong> <?php echo $usdVal; ?></p>
          <p><strong>Converted Amount:</strong> <?php echo $converted . " " . $currency; ?></p>
          <div id="qrcode"></div>
          <br>
          <br><br>
          <form action="" id="proofForm" enctype="multipart/form-data">
            <input type="hidden" value="<?= $_GET['transac_id'] ?>" name="transac_id" id="transac_id">
            <div class="avatar-edit">
              <label for="fileUpload" class="fileUp" style="color: #b58e43; font-size: 23px; margin-right: 1rem;">Proof of payment:</label>&nbsp;
              <input type="file" name="proof" id="fileUpload" class="upload" accept=".png, .jpg, .jpeg, .pdf, .docx, .epub" />
            </div>
            <button type="submit" class="btn btn-primary back-btn">Upload proof of payment</button>
          </form>
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
    $(document).ready(function() {
      $("#proofForm").on("submit", function(e) {
        e.preventDefault();
        var submitButton = $(this).find('button[type="submit"]');
        submitButton.prop('disabled', true).text("Uploading...");

        var formData = new FormData(this);
        $.ajax({
          url: "../../backend/actions/uploadProof.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(resp) {
            var data = (typeof resp === "object") ? resp : JSON.parse(resp);
            notify(data.status, data.message);
            // Reset button after update
            submitButton.prop('disabled', false).text("Done");

            window.setTimeout(() => {
              window.location = "../history"
            }, 1500)
          },
          error: function(xhr, status, error) {
            notify("error", "Error: " + error);
            submitButton.prop('disabled', false).text("Try again");
          }
        });
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
    // Generate a QR code for the deposit address
    new QRCode(document.getElementById("qrcode"), {
      text: "<?php echo $address; ?>",
      width: 128,
      height: 128,
      colorDark: "#000000",
      colorLight: "#ffffff",
      correctLevel: QRCode.CorrectLevel.H
    });

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