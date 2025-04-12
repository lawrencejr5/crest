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
            <h2 class="page-title">Comodity Trading</h2>
            <ul class="page-breadcrumb">
              <li><a href="https://assetbase-trading.com">Home</a></li>
              <li>Comodity Trading</li>
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
          We strive for excellence and our sole aim is to satisfy and fulfill the needs of our customers. As a trade
          enabler, we offer single window clearance for quick order execution. Assetbase Trading also offers several
          customized products to help the clients make smart trading decisions. At Assetbase Trading, we believe in
          our
          research abilities, based on technical and fundamental study of all major commodities, and clients can rely on us
          to get a clear picture of the market.
        </p>

        <p class="mb-3">
          We currently faciltiate the trading of the following:
        </p>

        <ul>
          <li class="mb-2"><b> - Bullion:</b> Gold, Gold Guinea, Gold HNI, Gold M, i-gold, Silver, Silver HNI,
            Silver M,
            Platinum</li>
          <li class="mb-2">
            <b> - Oil & Oil Seeds : </b> Castor Oil, Castor Seeds, Coconut Cake, Coconut Oil, Cotton Seed, Crude Palm Oil,
            Groundnut Oil, Kapasia Khalli, Mustard Oil, Mustard Seed (Jaipur), Mustard Seed (Sirsa), RBD Palmolein, Refined
            Soy Oil, Refined Sunflower Oil, Rice Bran DOC, Rice Bran Refined Oil, Sesame Seed, Soymeal, Soy Bean, Soy Seeds
          </li>
          <li class="mb-2"><b> - Spices :</b> Cardamom, Coriander, Jeera, Pepper, Red Chilli, Turmeric.</li>
          <li class="mb-2"><b> - Metal :</b>
            Aluminium, Copper, Lead, Nickel, Sponge Iron, Steel Long (Bhavnagar), Steel Long (Govindgarh), Steel Flat, Tin,
            Zinc
          </li>
          <li class="mb-2"><b> - Fiber :</b> Cotton L Staple, Cotton M Staple, Cotton S Staple, Cotton Yarn, Kapas,
            Raw Jute
          </li>
          <li class="mb-2"><b> - Pulses :</b> Chana, Masur, Yellow Peas</li>
          <li class="mb-2"><b> - Cereals :</b> Maize</li>
          <li class="mb-2"><b> - Energy :</b> ATF, Brent Crude Oil, Crude Oil, Furnace Oil, Natural Gas, M. E.
            Sour Crude
            Oil
          </li>
          <li class="mb-2"><b> - Plantations :</b> Arecanut Jahaji, Cashew Kernel, Coffee (Robusta), Red Arecanut
            Raashi,
            Rubber</li>
          <li class="mb-2"><b> - Petrochemicals :</b> HDPE, Polypropylene(PP), PVC</li>
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