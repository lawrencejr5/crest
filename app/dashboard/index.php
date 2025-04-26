<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../backend/udata.php" ?>
<?php include "../master/head.php" ?>

<body>
  <div class="mgm" style="display: none;">
    <div class="txt" style="color:#fbc013;">New trade from <b></b> just Now <a href="javascript:void(0);"
        onclick="javascript:void(0);"></a></div>
  </div>
  <style>
    .mgm {
      border-radius: 7px;
      position: fixed;
      z-index: 90;
      bottom: 80px;
      right: 50px;
      background: #000;
      padding: 10px 27px;
      box-shadow: 0px 5px 13px 0px rgba(0, 0, 0, .3);
    }

    .mgm a {
      font-weight: 700;
      display: block;
      color: #fff;
    }

    .mgm a,
    .mgm a:active {
      transition: all .2s ease;
      color: #fff;
    }
  </style>
  <script data-cfasync="false" src="#"></script>

  <style type="text/css">
    #copyBoard {
      cursor: pointer;
    }
  </style>
  <style type="text/css">
    #copyBoard {
      cursor: pointer;
    }
  </style>


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
              <li>Dashboard</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->


    <div class="pt-90 pb-40">

      <div class="pt-40 pb-50">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-12 pl-lg-5 mt-lg-0 mt-5">
              <div class="row mb-none-30">
                <div class="col-xl-4 col-sm-6 mb-30">
                  <div class="d-widget d-flex flex-wrap">
                    <div class="col-8">
                      <span class="caption">Deposit Wallet</span>
                      <h4 class="currency-amount">$<?= $total_user_balance ?></h4><br>
                      <hr>
                      <h6>Total Deposits: $<?= $total_deposits ?></h6>
                      <br><a href="../deposit" class="btn btn-success">Deposit</a>
                    </div>
                    <div class="col-4">
                      <div class="icon ml-auto">
                        <i class="las la-dollar-sign"></i>
                      </div>
                    </div>
                  </div><!-- d-widget-two end -->
                </div>
                <div class="col-xl-4 col-sm-6 mb-30">
                  <div class="d-widget d-flex flex-wrap">
                    <div class="col-8">
                      <span class="caption">Interest Wallet </span>
                      <h4 class="currency-amount">$<?= $total_interest ?></h4>
                      <br>
                      <hr>
                      <h6>Interest Readings: $<?= $total_interest_readings ?>
                      </h6><br><a href="../plan/investments" class="btn btn-success">Claim</a>
                    </div>
                    <div class="col-4">
                      <div class="icon ml-auto">
                        <i class="las la-wallet"></i>
                      </div>
                    </div>
                  </div><!-- d-widget-two end -->
                </div>
                <div class="col-xl-4 col-sm-6 mb-30">
                  <div class="d-widget d-flex flex-wrap">
                    <div class="col-8">
                      <span class="caption">Total Invested</span>
                      <h4 class="currency-amount">
                        $<?= $total_investments ?></h4><br>
                      <hr>
                      <h5>Promo Offer: $0
                        <!-- <br> -->
                        <!-- <small
                          style="color:green">
                          Promo Percentage:__
                        </small> -->
                      </h5>
                      <br>
                      <a href="./" class="btn btn-success">Claim Offer</a>
                    </div>
                    <div class="col-4">
                      <div class="icon ml-auto">
                        <i class="las la-cubes "></i>
                      </div>
                    </div>
                  </div><!-- d-widget-two end -->
                </div>

              </div><!-- row end -->
              <div class="row mt-50">
                <div class="col-lg-12">
                  <div class="table-responsive">
                    <table class="table style--two">
                      <thead>
                        <tr>
                          <th>Transaction ID</th>
                          <th>Dollar Value</th>
                          <th>Amount</th>
                          <th>Type</th>
                          <th>Date</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if (!empty($last_transactions)): ?>
                          <?php
                          // Define deposit types
                          $depositTypes = ['deposit', 'ref bonus', 'signup bonus', 'investment_returns'];
                          $withdrawalTypes = ['withdrawal', 'investement'];
                          ?>
                          <?php foreach ($last_transactions as $trans): ?>
                            <tr>
                              <!-- Transaction ID -->
                              <td><?= htmlspecialchars($trans['transac_id']) ?></td>
                              <!-- Amount: check if type is defined as deposit type -->
                              <td>
                                <?php
                                $typeLower = strtolower($trans['type']);
                                if (in_array($typeLower, $depositTypes)) : ?>
                                  <span class="text-success">+ $<?= htmlspecialchars($trans['dol_val']) ?></span>
                                <?php else: ?>
                                  <span class="text-danger">- $<?= htmlspecialchars($trans['dol_val']) ?></span>
                                <?php endif; ?>
                              </td>
                              <td> <?= htmlspecialchars($trans['amount'] . $trans['currency']) ?> </td>
                              <!-- Wallet: display based on type -->
                              <td style="text-transform: capitalize;">
                                <?= $trans['type'] ?>
                              </td>
                              <!-- Date: formatted from datetime -->
                              <td><?= htmlspecialchars(date("d M, Y h:i A", strtotime($trans['datetime']))) ?></td>
                              <!-- Status -->
                              <td>
                                <?php if ($trans['status'] == "success"): ?>
                                  <span class="text-success"><?= htmlspecialchars($trans['status']) ?></span>
                                <?php elseif ($trans['status'] == "pending"): ?>
                                  <span class="text-warning"><?= htmlspecialchars($trans['status']) ?></span>
                                <?php else: ?>
                                  <span class="text-danger"><?= htmlspecialchars($trans['status']) ?></span>
                                <?php endif; ?>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        <?php else: ?>
                          <tr>
                            <td colspan="5" class="text-center text-muted">No transactions found.</td>
                          </tr>
                        <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div><!-- row end -->



            </div>
          </div>
        </div>
      </div>


      <div class="container my-3">
        <div class="row justify-content-center">
          <div class="col-lg-12 pl-lg-5 mt-lg-0 mt-5">
            <div class="row mb-none-30">
              <div class="col-md-12 mb-4">
                <div class="alert alert-info" role="alert">
                  <h4 class="alert-heading">*Affiliate Program</h4>
                  <p>Copy the link below, share with people and earn 10% on every deposit the make.</p>
                  <div class="input-group">
                    <input type="text" name="text" class="form-control" id="referralURL" style="background-color: #000;"
                      value="localhost/crest/register/?ref=<?= $user['user_id'] ?>" readonly>
                    <div class="input-group-append">
                      <span class="input-group-text copytext copyBoard" id="copyBoard"> <i class="fa fa-copy"></i>
                      </span>
                    </div>
                  </div>
                  <hr>
                  <p class="mb-0">Your current Referral earning : </p>
                  <h4 class="currency-amount" style="color:#fbc013">
                    $0</h4>
                  <!--<button type="button" class="btn btn-primary">
                  Total Referrals <span class="badge bg-secondary">4</span>
                </button>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="container mb-3">
        <div class="row justify-content-center">
          <div class="col-lg-12 pl-lg-5 mt-lg-0 my-5">
            <div class="row mb-none-30">
              <div class="col-md-12">

                <div class="card">
                  <h5 class="card-header">How it works</h5>
                  <div class="card-body">
                    <h5 class="card-title">This is how to invest on Assetbase Trading</h5>
                    <div class="row">
                      <div class="col-md-4 text-center mb-2">
                        <i class="las la-money-bill-wave la-3x"></i>
                        <p>1) Fund you account using one of our deposit method(cryptocurrency is preferable).</p>
                      </div>
                      <div class="col-md-4 text-center mb-2">
                        <i class="las la-list la-3x"></i>
                        <p>2) Choose a package/plan of your choice from our plan menu and activate(you will get a mail once your plans is active.)</p>
                      </div>
                      <div class="col-md-4 text-center mb-2">
                        <i class="las la-desktop la-3x text-white"></i>
                        <p>3) Monitor your earning from your dashboard;once a plan expires you can request for a withdrawal.</p>
                      </div>
                      <div class="col-md-4 text-center mb-2">
                        <i class="las la-info-circle la-3x text-white"></i>
                        <p>4) Compunding of profits is allowed;profits can be compounded up to 6 Months.</p>
                      </div>
                      <div class="col-md-4 text-center mb-2">
                        <i class="las la-headset la-3x text-white"></i>
                        <p>5) If you face any issues or need any information our live support is always available to help you; click on the chat bubble located at them footer.</p>
                      </div>
                    </div>
                    <p class="text-center mt-3">
                      <center><?= $root ?></center>
                      <a href="../plan" class="btn btn-success">Choose Plan</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>



      <div class="container mb-4">
        <div class="row justify-content-center">
          <div class="col-lg-12 pl-lg-5 mt-lg-0 mt-5">
            <div class="row mb-none-30">
              <div class="col-md-12 mb-4">

                <div class="card">
                  <h5 class="card-header">BECOME A SHAREHOLDER</h5>
                  <div class="card-body">
                    <p class="card-title">
                      We actually made it possible for our investors to own a share in the company and also earn their shares percentage
                      like the masterminds behind asset trading. Becoming a SHAREHOLDER will earn you percentage commission when deposit
                      is been made by any single user in our platform.
                      <br />
                      The SHAREHOLDER'S PLAN gives you multiple packages below,you can become a shareholder by minimum deposit of 35,000$ and
                      enjoy more features as a shareholder.
                    </p>

                    <h3 class="my-3">SHAREHOLDER PLAN: </h3>

                    <div class="row">
                      <div class="col-md-4 mb-3">
                        <h3>$35,000</h3>
                        <p>2% Profit Return Everyday</p>
                      </div>
                      <div class="col-md-4 mb-3">
                        <h3>$50,000</h3>
                        <p>3.5% Profit Return Everyday</p>
                      </div>
                      <div class="col-md-4 mb-3">
                        <h3>$70,000</h3>
                        <p>5% Profit Return Everyday</p>
                      </div>
                    </div>

                    <p class="text-bold">Duration: LIFE TIME (no limit)you are more like an owner.</p>
                  </div>
                </div>
              </div>
            </div>
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
      $('.copyBoard').click(function() {
        "use strict";
        var copyText = document.getElementById("referralURL");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        /*For mobile devices*/
        document.execCommand("copy");
        iziToast.success({
          message: "Copied: " + copyText.value,
          position: "topRight"
        });
      });
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