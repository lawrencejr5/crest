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
            <h2 class="page-title">Welcome Back!</h2>
            <ul class="page-breadcrumb">
              <li><a href="https://assetbase-trading.com">User</a></li>
              <li>Deposit Wallet Transactions</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <section class="cmn-section pt-60">
      <div class="container">
        <div class="row justify-content-center mt-2">
          <div class="col-md-12">
            <div class="right float-right mb-5">
              <a href="javascript:void(0) " class="btn cmn-btn mb-md-0 mb-3 btn-disabled">
                Deposit Wallet Transactions
              </a>
              <a href="/crest/app/transactions/interest" class="btn cmn-btn mb-md-0">
                Interest Wallet Transactions
              </a>
            </div>
          </div>
          <div class="col-md-12">
            <div class="table-responsive--md">
              <table class="table style--two">
                <thead>
                  <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Trx</th>
                    <th scope="col">Details</th>
                    <th scope="col">Type</th>
                    <th scope="col">Remaining balance</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (isset($all_transactions) && count($all_transactions) > 0): ?>
                    <?php foreach ($all_transactions as $transaction): ?>
                      <tr>
                        <!-- Date: formatted from the created_at field -->
                        <td data-label="Date">
                          <?= date("d M, Y h:i A", strtotime($transaction['datetime'])) ?>
                        </td>
                        <!-- Transaction ID -->
                        <td data-label="#Trx">
                          <?= htmlspecialchars($transaction['transac_id']) ?>
                        </td>
                        <!-- Details: using the type column -->
                        <td data-label="Details">
                          <?= ucfirst(htmlspecialchars($transaction['type'])) ?>
                        </td>
                        <!-- Amount: show plus for deposits, minus for withdrawals -->
                        <td data-label="Amount">
                          <?php if (strtolower($transaction['type']) == 'deposit'): ?>
                            <strong class="text-success">+ <?= htmlspecialchars($transaction['dol_val']) ?> USD</strong>
                          <?php else: ?>
                            <strong class="text-danger">- <?= htmlspecialchars($transaction['dol_val']) ?> USD</strong>
                          <?php endif; ?>
                        </td>
                        <!-- Remaining balance: using the current user's total balance -->
                        <td data-label="Remaining balance">
                          <?= htmlspecialchars($total_user_balance) ?> USD
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="5" class="text-muted text-center">No transactions found.</td>
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