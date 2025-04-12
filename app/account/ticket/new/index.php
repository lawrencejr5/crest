<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../../../master/head.php" ?>


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
    <?php include "../../../master/nav.php" ?>

    <!-- header-section end  -->


    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="black">


      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Welcome Back!</h2>
            <ul class="page-breadcrumb">
              <li><a href="https://assetbase-trading.com">User</a></li>
              <li>Support Tickets</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <section class="cmn-section">
      <div class="container">
        <div class="card">
          <div class="card-header">
            <div class="col-md-12 mb-30">
              <ul class="right">
                <li>
                  <a href="https://assetbase-trading.com/ticket" class="btn float-right btn-dark" data-toggle="tooltip" data-placement="top" title="My Support Ticket">
                    <i class="fa fa-eye"></i> See All </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-60-80">
              <div class="col-md-12 mb-30">
                <form action="https://assetbase-trading.com/ticket/create" role="form" method="post" enctype="multipart/form-data">
                  <input type="hidden" name="_token" value="v0QlAVhKtAuRzkedf8cRKcXDWi5QXYEAoRmRB7FZ">
                  <div class="row ">
                    <div class="form-group col-md-6">
                      <label for="name">Name</label>
                      <input type="text" name="name" value="Beans Garri" class="form-control form-control-lg" placeholder="Enter Name" required readonly>
                    </div>

                    <div class="form-group col-md-6">
                      <label for="email">Email address</label>
                      <input type="email" name="email" value="beansndgarri@gmail.com" class="form-control form-control-lg" placeholder="Enter your Email" required readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="website">Subject</label>
                      <input type="text" name="subject" value="" class="form-control form-control-lg" placeholder="Subject">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 form-group">
                      <label for="inputMessage">Message</label>
                      <textarea name="message" id="inputMessage" rows="12" class="form-control"></textarea>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-sm-12">
                      <label for="inputAttachments">Attachments</label>
                    </div>
                    <div class="col-9 file-upload">
                      <input type="file" name="attachments[]" id="inputAttachments" class="form-control form-control" />
                      <div id="fileUploadsContainer"></div>
                    </div>
                    <div class="col-3">
                      <button type="button" class="btn cmn-btn extraTicketAttachment">
                        <i class="fa fa-plus"></i>
                      </button>
                    </div>
                    <div class="col-sm-12 ticket-attachments-message text-muted">
                      Allowed File Extensions: .jpg, .jpeg, .png, .pdf, .doc, .docx </div>
                  </div>
                  <div class="row form-group justify-content-center">
                    <div class="col-md-12">
                      <button class="btn cmn-btn w-100 bg-3  text-center mt-3" type="submit" id="recaptcha">&nbsp;Submit Now</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>



    <!-- footer section start -->
    <?php include "../../../master/footer.php" ?>

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
    $('.extraTicketAttachment').click(function() {
      "use strict";
      $("#fileUploadsContainer").append('<input type="file" name="attachments[]" class="form-control my-3" required />')
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