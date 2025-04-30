<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
include "../../backend/udata.php";  // Must set $user and $modules

// If user has no secret, generate one
if (empty($user['two_factor_secret'])) {
  $secret = $modules->generate2FASecret($user['id']);
  $user['two_factor_secret'] = $secret;
} else {
  $secret = $user['two_factor_secret'];
}

use OTPHP\TOTP;

$totp = TOTP::create($secret);
$totp->setLabel($user['email']);
$totp->setIssuer('Crest');
$qrCodeUrl = $totp->getProvisioningUri();
?>
<!DOCTYPE html>
<html lang="en">

<?php include "../../master/head.php"; ?>

<body>
  <div class="page-wrapper">
    <?php include "../../master/nav.php"; ?>

    <section class="inner-hero bg_img" data-background="black">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Two Factor Authentication</h2>
            <ul class="page-breadcrumb">
              <li><a href="<?= $root ?>/app/dashboard">User</a></li>
              <li>Two Factor Authentication</li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <section class="cmn-section">
      <div class="container">
        <div class="row dashboard-content">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="dashboard-inner-content">
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="card">
                    <h5 class="card-header">Two Factor Authenticator</h5>
                    <div class="card-body">
                      <!-- Display the QR code -->
                      <div class="form-group text-center">
                        <div id="qrcode"></div>
                      </div>

                      <!-- Show the secret key for manual entry -->
                      <div class="form-group">
                        <label for="referralURL">Your 2FA Secret</label>
                        <div class="input-group">
                          <input type="text" name="key" value="<?= htmlspecialchars($secret) ?>" class="form-control form-control-lg" id="referralURL" readonly>
                          <div class="input-group-append">
                            <span class="input-group-text copytext copyBoard" id="copyBoard" onclick="copyKey()"> <i class="fa fa-copy"></i> </span>
                          </div>
                        </div>
                      </div>

                      <div class="form-group mx-auto text-center">
                        <!-- Show Enable or Disable button based on 2fa state -->
                        <?php if (isset($user['two_factor_enabled']) && $user['two_factor_enabled']): ?>
                          <a href="#0" class="btn btn-lg mt-3 mb-1 cmn-btn" data-toggle="modal" data-target="#disableModal">Disable Two Factor Authenticator</a>
                        <?php else: ?>
                          <a href="#0" class="btn btn-lg mt-3 mb-1 cmn-btn" data-toggle="modal" data-target="#enableModal">Enable Two Factor Authenticator</a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class=" card">
                    <h5 class="card-header">Google Authenticator</h5>
                    <div class=" card-body">
                      <h5 class="text-uppercase">Use Google Authenticator to Scan the QR code or use the code</h5>
                      <hr />
                      <p>Google Authenticator is a multifactor app for mobile devices. It generates timed codes used during the 2-step verification process. To use Google Authenticator, install the Google Authenticator application on your mobile device.</p>
                      <a class="btn btn-md mt-3 cmn-btn"
                        href="https://play.google.com/store/apps/details?id=com.google.android.apps.authenticator2&hl=en"
                        target="_blank">DOWNLOAD APP</a>
                    </div>
                  </div><!-- //. single service item -->
                </div>
                <!-- You can add additional information here if needed -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Enable 2FA Modal -->
    <div id="enableModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content modal-content-bg">
          <div class="modal-header">
            <h4 class="modal-title">Verify Your OTP to Enable 2FA</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form method="POST" class="register" id="enableForm">
            <div class="modal-body">
              <p>After scanning the QR code (or entering the secret manually) in your Google Authenticator app, enter the OTP code below.</p>
              <div class="form-group">
                <input type="text" class="form-control" name="code" placeholder="Enter OTP Code">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger action-btn" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary action-btn">Verify</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Disable 2FA Modal -->
    <div id="disableModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content modal-content-bg">
          <div class="modal-header">
            <h4 class="modal-title">Verify Your OTP to Disable 2FA</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form method="POST" class="register" id="disableForm">
            <div class="modal-body">
              <p>Enter the OTP code from your app to disable two factor authentication.</p>
              <div class="form-group">
                <input type="text" class="form-control" name="code" placeholder="Enter OTP Code">
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger action-btn" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary action-btn">Verify</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <?php include "../../master/footer.php"; ?>
  </div>

  <!-- Scripts -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/jquery-3.5.1.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/bootstrap.bundle.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/slick.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/wow.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/app.js"></script>
  <link rel="stylesheet" href="https://assetbase-trading.com/assets/templates/bit_gold/css/iziToast.min.css">
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/iziToast.min.js"></script>

  <script>
    $(document).ready(function() {
      new QRCode(document.getElementById("qrcode"), {
        text: "<?= $qrCodeUrl ?>",
        width: 128,
        height: 128,
        colorDark: "#000000",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
      });
    });

    function copyKey() {
      var copyText = document.getElementById("referralURL");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      document.execCommand("copy");
      alert("Copied: " + copyText.value);
    }

    $(document).ready(function() {
      $('#enableForm').submit(function(e) {
        e.preventDefault();
        var code = $(this).find('input[name="code"]').val();
        $.ajax({
          type: "POST",
          url: "../../backend/actions/2fa.php",
          data: {
            action: 'enable',
            code: code
          },
          dataType: "json",
          success: function(response) {
            if (response.status === 'success') {
              console.log("Success: " + response.message);
              alert(response.message);
              location.reload();
            } else {
              console.error("Error: " + response.message);
              alert(response.message);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown, jqXHR.responseText);
            alert("An error occurred while enabling 2FA. Check console for details.");
          }
        });
      });

      $('#disableForm').submit(function(e) {
        e.preventDefault();
        var code = $(this).find('input[name="code"]').val();
        $.ajax({
          type: "POST",
          url: "../../backend/actions/2fa.php",
          data: {
            action: 'disable',
            code: code
          },
          dataType: "json",
          success: function(response) {
            if (response.status === 'success') {
              console.log("Success: " + response.message);
              alert(response.message);
              location.reload();
            } else {
              console.error("Error: " + response.message);
              alert(response.message);
            }
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error("AJAX Error:", textStatus, errorThrown, jqXHR.responseText);
            alert("An error occurred while disabling 2FA. Check console for details.");
          }
        });
      });
    });
  </script>
</body>

</html>