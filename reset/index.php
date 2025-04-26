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
    <div class="account-section bg_img">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-7">
            <div class="account-card">

              <div class="account-card__body">
                <h2>Reset Password</h2>
                <form action="" class="mt-4" method="post">
                  <input type="hidden" name="_token" value="0DI0kMOBNY3bUeI2Pt0ohYKyAlF44jwPb8z1eQjf">
                  <div class="form-group">
                    <label>Email Address</label>
                    <input id="email" type="email" name="email" class="form-control" value="" placeholder="Email Address" required autocomplete="email" autofocus>
                  </div>
                  <div class="mt-3">
                    <button type="submit" class="cmn-btn">Send Password Reset Code</button>
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


</body>

</html>