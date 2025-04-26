<!-- meta tags and other links -->
<?php !$_GET['em_verify'] && !$_GET['fname'] && header('location: ../') ?>

<!DOCTYPE html>
<html lang="en">

<?php include "../../master/head.php" ?>

<body>

  <style>
    #verify_inp {
      width: 100%;
      border: 2px solid #b58e43;
      background-color: transparent;
      padding: .5rem;
      border-radius: 7px;
      font-weight: 600;
      color: #b58e43;
    }
  </style>

  <div class="page-wrapper">
    <!-- header-section start  -->
    <?php include "../../master/nav.php" ?>

    <!-- header-section end  -->

    <!-- account section start -->
    <div class="account-section bg_img">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-xl-5 col-lg-7">
            <div class="account-card">

              <div class="account-card__body">
                <h2 class="text-center">Email verification form</h2>
                <form action="" method="POST">
                  <div class="form-group">
                    <h5 class="mb-4 text-center">Enter Verification Code</h5>
                    <input type="hidden" value="<?= $_GET['fname'] ?>" name="fname" id="fname">
                    <input type="hidden" value="<?= $_GET['em_verify'] ?>" name="em_verify" id="em_verify">
                    <div class="inp-holder">
                      <input type="text" id="verify_inp" placeholder="Verification code">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="btn-area  justify-content-center">
                      <button type="button" id="verify-btn" class="btn-md cmn-btn w-100">Submit</button>
                    </div>
                  </div>

                  <div class="form-group">
                    <p>Please check including your Junk/Spam Folder. if not found, you can
                    <form>
                      <input type="hidden" id="resend_code" value="<?php echo rand(100000, 999999) ?>">
                      <button type="button" id="resend_btn" style="color: #b58e43; border: none; background: transparent; padding: 0;">Resend code</button>
                    </form>
                    </p>
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
    <?php include "../../master/footer.php" ?>

    <!-- footer section end -->
  </div> <!-- page-wrapper end -->


  <script>
    $(function() {
      "use strict";
      $('#phoneInput').letteringInput({
        inputClass: 'letter',
        onLetterKeyup: function($item, event) {
          console.log('$item:', $item);
          console.log('event:', event);
        },
        onSet: function($el, event, value) {
          console.log('element:', $el);
          console.log('event:', event);
          console.log('value:', value);
        }
      });
    });
  </script>


  <script type="text/javascript">
    const resend_btn = document.querySelector('#resend_btn')
    resend_btn.addEventListener('click', () => {

      resend_btn.innerHTML = 'Resending...'

      const resend_code = document.querySelector('#resend_code').value
      const email = document.querySelector('#em_verify').value
      const fname = document.querySelector('#fname').value

      $.ajax({
        url: '../../app/backend/actions/resend.php',
        type: 'post',
        dataType: 'json',
        data: {
          resend_code,
          email,
          fname
        },
        success: (res) => {
          if (res.header == 'resent') {
            notify("success", "OTP resent");
            setTimeout(() => {
              window.location.reload()
            }, 3000)
          } else if (res.header == 'err') {
            notify("success", "An error occured");
            setTimeout(() => {
              window.location.reload()
            }, 3000)
          }
        }
      })
    })

    const verify_btn = document.querySelector('#verify-btn')
    verify_btn.addEventListener('click', () => {

      verify_btn.innerHTML = 'Verifying...'

      const code = document.querySelector('#verify_inp').value
      const email = document.querySelector('#em_verify').value
      const fname = document.querySelector('#fname').value

      if (code.length < 6) {
        notify("error", "OTP cannot be less that 6");
        verify_btn.innerHTML = 'Try again'
      } else if (code.length > 6) {
        notify("error", "OTP cannot be more that 6");
        verify_btn.innerHTML = 'Try again'
      } else {
        $.ajax({
          url: '../../app/backend/actions/verify.php',
          dataType: 'json',
          type: 'post',
          data: {
            code,
            email,
            fname
          },
          success: (res) => {
            if (res.header == 'wrong') {
              notify("error", "OTP is not correct");
              verify_btn.innerHTML = 'Try again'
            } else if (res.header == 'err') {
              notify("error", "OTP is not correct");
              setTimeout(() => {
                window.location = './'
              }, 3000)
            } else if (res.header == 'verified') {
              notify("success", "Your email has been verified, proceed to login");
              setTimeout(() => {
                window.location = '../../login/'
              }, 3000)
            }
          }
        })
      }
    })
  </script>



</body>

</html>