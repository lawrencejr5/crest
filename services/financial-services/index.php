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
            <h2 class="page-title">Financial Services</h2>
            <ul class="page-breadcrumb">
              <li><a href="https://assetbase-trading.com">Home</a></li>
              <li>Financial Services</li>
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
        <h4>FINANCIAL SERVICES</h4>
        Highly qualified and experienced staff give independent advice on such financial services as pensions, inheritance
        tax, life assurance and protection, health insurance, employee benefits, investments, business protection and
        wealth planning. We help companies pivot into more profitable directions where they can expand and grow. It is
        inevitable that individuals and companies will end up making a few mistakes; we help them correct these mistakes.
        We help companies turnaround their non-profitable ventures into something that benefits them. Our specialty lies
        in understanding what makes a company special and what makes it tick.
        </p>

        <p class="mb-3">
        <h4>Business planning & strategy</h4>
        Our clients are often surprised by the possibilities we present to them; we work with leading institutions in the
        banking, insurance and asset management sectors in all major areas, including:
        </p>

        <p class="mb-3">
        <ul>
          <li> - Retail banking</li>
          <li> - Private banking and wealth management</li>
          <li> - Corporate banking and capital markets</li>
          <li> - Transaction banking</li>
          <li> - Asset management</li>
          <li> - Life and property insurance</li>
          <li> - Health insurance</li>
          <li> - Reinsurance</li>
          <li> - Risk, liquidity and capital management</li>
          <li> - Stock markets and financial market infrastructure</li>
        </ul>
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