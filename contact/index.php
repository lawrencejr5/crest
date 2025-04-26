<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../master/head.php" ?>

<body>
  <div class="page-wrapper">
    <!-- header-section start  -->
    <?php include "../master/nav.php" ?>
    <!-- header-section end  -->

    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="<?= $root ?>/assets/images/frontend/breadcrumb/60f9a423788ce1626973219.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Contact Us</h2>
            <ul class="page-breadcrumb">
              <li><a href="<?= $root ?>">Home</a></li>
              <li>Contact Us</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end --> <!-- contact section start -->
    <section class="pt-120 pb-120">
      <div class="container">
        <div class="contact-wrapper">
          <div class="row">
            <div class="col-lg-6 contact-thumb bg_img" data-background="<?= $root ?>/assets/images/frontend/contact/5fce3861b2a1c1607350369.jpg"></div>
            <div class="col-lg-6 contact-form-wrapper">
              <h2 class="font-weight-bold mb-2">Contact With Us</h2>
              <p class="font-weight-bold">If you have any questions or queries that are not answered on our website, please feel free to contact us. We will try to respond to you as soon as possible. Thank you so much.</p>
              <form action="" method="post" class="contact-form mt-4">
                <input type="hidden" name="_token" value="0DI0kMOBNY3bUeI2Pt0ohYKyAlF44jwPb8z1eQjf">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" placeholder="Full Name" class="form-control">
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" name="email" placeholder="Email Address" class="form-control">
                  </div>
                  <div class="form-group col-lg-12">
                    <input name="subject" placeholder="Subject" class="form-control">
                  </div>
                  <div class="form-group col-lg-12">
                    <textarea class="form-control" name="message" placeholder="Message"></textarea>
                  </div>
                  <div class="col-lg-12">
                    <button type="submit" class="cmn-btn">Send Message</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div><!-- contact-wrapper end -->
      </div>
      <div class="container pt-120">
        <div class="row justify-content-center">
          <div class="col-lg-10">
            <div class="row mb-none-30">
              <div class="col-md-4 col-sm-6 mb-30">
                <div class="contact-item">
                  <i class="las la-envelope-open"></i>
                  <h5 class="mt-2">Email Address</h5>
                  <div class="mt-4">
                    <p><a href="javascript:void(0)"><?= $email ?></a></p>
                  </div>
                </div><!-- contact-item end -->
              </div>
              <div class="col-md-4 col-sm-6 mb-30">
                <div class="contact-item">
                  <i class="las la-map-marker"></i>
                  <h5 class="mt-2">Office Address</h5>
                  <div class="mt-4">
                    <p><a href="javascript:void(0)">240a Spring Bank, Kingston Upon Hull, East Yorkshire, United Kingdom, HU3 1LU</a></p>
                  </div>
                </div><!-- contact-item end -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- contact section end -->




    <!-- footer section start -->
    <?php include "../master/footer.php" ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->



  <script src="https://maps.google.com/maps/api/js?key="></script>
  <script src="<?= $root ?>/assets/templates/bit_gold/js/map.js"></script>




</body>

</html>