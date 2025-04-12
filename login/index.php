<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../master/head.php" ?>

<body>
  <div class="page-wrapper">
    <!-- header-section start  -->
    <?php include "../master/nav.php" ?>
    <!-- header-section end  -->

    <!-- account section start -->
    <div class="account-section bg_img" data-background="black">


      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-7">
            <div class="account-card">
              <div class="account-card__header bg_img overlay--one" data-background="black">


                <img src="/crest/assets/images/logoIcon/crest2-nobg.png" alt="image">
                <h2>Welcome To <span class="base--color">Crest Asset Trading</span></h2>
                <!--<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus distinctio deserunt impedit similique debitis voluptatum enim.</p>-->
              </div>
              <div class="account-card__body">
                <form action="/crest/login" class="mt-4" method="post" onsubmit="return submitUserForm();">
                  <input type="hidden" name="_token" value="0DI0kMOBNY3bUeI2Pt0ohYKyAlF44jwPb8z1eQjf">
                  <div class="form-group">
                    <label>User Name</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter user name" required>
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" type="text" class="form-control" name="password" placeholder="Enter password" required>
                  </div>
                  <div class="form-group d-flex justify-content-center">
                  </div>

                  <div class="mt-3">
                    <center><button type="submit" class="cmn-btn">Login Now</button></center>
                  </div>
                  <div class="form-row mt-2">
                    <div class="col-sm-6">
                      <div class="form-group form-check pl-0">
                        <p class="f-size-14">Forgot Password? <a href="/crest/reset" class="base--color">Reset Now</a></p>
                      </div>
                    </div>
                    <div class="col-sm-6 text-sm-right">
                      <p class="f-size-14">Haven't an account? <a href="/crest/register" class="base--color">Sign Up</a></p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- account section end -->



    <!-- footer section start -->
    <?php include "../master/footer.php" ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->

  <!-- jQuery library -->
  <script src="./assets/templates/bit_gold//js/vendor/jquery-3.5.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="./assets/templates/bit_gold//js/vendor/bootstrap.bundle.min.js"></script>

  <!-- slick slider js -->
  <script src="./assets/templates/bit_gold//js/vendor/slick.min.js"></script>
  <script src="./assets/templates/bit_gold//js/vendor/wow.min.js"></script>
  <!-- dashboard custom js -->
  <script src="./assets/templates/bit_gold//js/app.js"></script>


  <link rel="stylesheet" href="./assets/templates/bit_gold/css/iziToast.min.css">
  <script src="./assets/templates/bit_gold/js/iziToast.min.js"></script>


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
    "use strict";

    function submitUserForm() {
      var response = grecaptcha.getResponse();
      if (response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">Captcha field is required.</span>';
        return false;
      }
      return true;
    }

    function verifyCaptcha() {
      document.getElementById('g-recaptcha-error').innerHTML = '';
    }
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
        window.location.href = "/crest/change/" + $(this).val();
      });

      $('.policy').on('click', function() {
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
        $.get('/crest/cookie/accept', function(response) {
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