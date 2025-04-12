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
              <li><a href="https://assetbase-trading.com">User</a></li>
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
                          class="btn btn-block  cmn-btn deposit" data-toggle="modal" data-target="#exampleModal">
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
                          class="btn btn-block  cmn-btn deposit" data-toggle="modal" data-target="#exampleModal">
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
                          class="btn btn-block  cmn-btn deposit" data-toggle="modal" data-target="#exampleModal">
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
                          class="btn btn-block  cmn-btn deposit" data-toggle="modal" data-target="#exampleModal">
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


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-bg">
          <div class="modal-header">
            <h5 class="modal-title method-name" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="https://assetbase-trading.com/user/withdraw" method="post" class="register">
            <input type="hidden" name="_token" value="v0QlAVhKtAuRzkedf8cRKcXDWi5QXYEAoRmRB7FZ">
            <div class="modal-body">
              <p class="text-info depositLimit"></p>
              <p class="text-info depositCharge"></p>

              <div class="form-group">
                <input type="hidden" name="currency" class="edit-currency form-control" value="">
                <input type="hidden" name="method_code" class="edit-method-code  form-control" value="">
              </div>



              <div class="form-group">
                <label>Enter Amount:</label>
                <div class="input-group">
                  <input id="amount" type="text" class="form-control form-control-lg" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')" name="amount" placeholder="0.00" required="" value="">

                  <div class="input-group-prepend">
                    <span class="input-group-text addon-bg currency-addon">USD</span>
                  </div>
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn cmn-btn">Confirm</button>
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



  <!-- Smartsupp Live Chat script -->
  <script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = 'a7019ddffb05d22ada67c29ad54e97b0183447dd';
    window.smartsupp || (function(d) {
      var s, c, o = smartsupp = function() {
        o._.push(arguments)
      };
      o._ = [];
      s = d.getElementsByTagName('script')[0];
      c = d.createElement('script');
      c.type = 'text/javascript';
      c.charset = 'utf-8';
      c.async = true;
      c.src = 'https://www.smartsuppchat.com/loader.js?';
      s.parentNode.insertBefore(c, s);
    })(document);
  </script>
  <noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>

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
    var Tawk_API = Tawk_API || {},
      Tawk_LoadStart = new Date();
    (function() {
      var s1 = document.createElement("script"),
        s0 = document.getElementsByTagName("script")[0];
      s1.async = true;
      s1.src = "https://embed.tawk.to/61e18cf4b84f7301d32b08aa/1fpcgt7ka";
      s1.charset = "UTF-8";
      s1.setAttribute("crossorigin", "*");
      s0.parentNode.insertBefore(s1, s0);
    })();
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





</body>

</html>

</body>

</html>