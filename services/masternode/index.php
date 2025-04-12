<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../../master/head.php" ?>


<body>
  <div class="page-wrapper">
    <!-- header-section start  -->
    <?php include "../../master/nav.php" ?>

    <!-- header-section end  -->

    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="https://assetbase-trading.com/assets/images/frontend/breadcrumb/60f9a423788ce1626973219.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Masternode</h2>
            <ul class="page-breadcrumb">
              <li><a href="https://assetbase-trading.com">Home</a></li>
              <li>Masternode</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <!-- contact section start -->
    <section class="pt-120 pb-120">

      <div class="px-4">
        <p class="mb-3">
          Masternode secure yields for crypto assets enthusiasts, masternode is a crisis resistance system designed to yield
          profits for investors through cryptocurrency; an alternate way to make revenue in blockchain technology and relies
          on a proof-of-stake(POS) approach.
        </p>

        <p class="mb-3">
          Masternode is not crypto trading/forex trading program but a “pay for service” system that generates profits based
          on a mathematical algorithm ingrained within each master-noded coin.
        </p>

        <p class="mb-3">
          In Masternode loss of capital is highly unlikely. Naturally, there are expenses, but servers are rented and
          contracts can be canceled. Clearly, fluctuations in coin prices affect the market, and master node earnings are
          always in coins, But since the deposited stake become free again when a master node is switched off,
          Gatewaycapital can pay back deposits at any time.
        </p>

        <p class="mb-3">
          Assured profit is all about Masternode because, your capital will be returned along with any accrued profits.
        </p>

        <p class="mb-3">
          Masternode is NOT a forex trading scheme. The participants funds are used to rent servers and supercomputers that
          master-node age generate coins that we sell. It’s more of a rental program and should be viewed as such!. Rest
          assured- safety of your capital takes highest priority.
        </p>
      </div>
    </section>
    <!-- contact section end -->




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



</body>

</html>