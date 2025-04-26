<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../app/backend/module.php" ?>
<?php include "../master/head.php" ?>

<body>

  <style>
    .plan-area {
      position: relative;
      display: flex;
      width: 100%;
      height: auto;
      margin-top: 20px;
      justify-content: center;
    }

    .plan-item {
      padding-top: 10px;
      width: 300px;
      min-height: 500px;
      position: relative;
      overflow: hidden;
      border-radius: 5px;
      margin: 0 10px 0 0;
      text-align: center;
      transition: all 1s ease;
      z-index: 9;
      background-color: transparent;
      border: 2px solid #b58e43;
    }

    .plan-item::before {
      position: absolute;
      content: "";
      bottom: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: transparent;
      z-index: -10;
    }

    .plan-item h3 {
      font-size: 20px;
      color: #fff;
      font-weight: 700;
      text-shadow: 0 1px 0 #ccc;
    }

    .plan-item .dots-area {
      position: absolute;
      width: 100%;
      bottom: 40%;
      left: 0;
    }

    .plan-item .dots-area span {
      width: 10px;
      height: 10px;
      border: 2px solid #b58e43;
      background-color: #b58e43;
      border-radius: 50%;
    }

    .plan_name {
      font-size: 20px;
      color: #fff;
      font-weight: 700;
      text-shadow: 0 1px 0 #ccc;
    }

    .plan-header {
      display: flex;
      justify-content: space-around;
      align-items: center;
      width: 100%;
      border-bottom: 2px solid #b58e43;
    }

    .plan-header h3 {
      margin: 0;
    }

    .plan-details {
      margin: 3rem 0;
    }

    .plan-details .item {
      display: flex;
      justify-content: space-around;
      align-items: center;
      margin: 1rem 0;
    }

    .plan-details .item span {
      width: 100%;
      color: #fff;
      font-size: 16px;
    }

    .plan_day {
      text-transform: uppercase;
      font-weight: 700;
      font-size: 32px;
      color: #b58e43;
      margin: -17px 0 0 0;
    }

    .plan_day span {
      font-size: 14px;
      color: #858383;
      font-weight: 600;
      text-transform: uppercase;
    }

    .plan_pr {
      font-weight: 300;
      font-size: 18px;
      color: #fff;
    }

    .plan_min {
      font-size: 20px;
      margin: 80px 0 15px 0;
      color: #fff;
    }

    .plan_min span {
      display: block;
      font-weight: 700;
      font-size: 24px;
      color: #fff;
    }

    .plan-item .btn-primary {
      font-size: 16px;
    }

    .plan-item:hover {
      box-shadow: 0 0 40px rgba(18, 22, 34, 0.8);
      transform: scale(1.1);
      z-index: 2;
    }
  </style>


  <div class="page-wrapper">
    <!-- header-section start  -->
    <?php include "../master/nav.php" ?>
    <!-- header-section end  -->

    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="<?= $root ?>/assets/images/frontend/breadcrumb/60f9a423788ce1626973219.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Investment Plan</h2>
            <ul class="page-breadcrumb">
              <li><a href="<?= $root ?>">Home</a></li>
              <li>Investment Plan</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <section class="pt-10 pb-120 px-3">
      <div class="container px-lg-5 px-md-0">
        <div class="row justify-content-center">
          <div class="col-lg-6 text-center">
            <div class="section-header">
              <h2 class="section-title"><span
                  class="font-weight-normal"></span> <b
                  class="base--color"></b></h2>
              <p></p>
            </div>
          </div>
        </div><!-- row end -->
        <div class="row mb-none-30 justify-content-center px-lg-5 px-md-0">

          <?php $data = $modules->getAllPlans(); ?>
          <?php foreach ($data as $invest): ?>

            <div class="col-md-4 mb-30">
              <div class="plan-area">
                <div class="plan-item">
                  <div class="plan_name" style="font-size: 1.3rem; text-transform:uppercase;"><?= $invest['plan_name'] ?></div><br><br>
                  <div class="plan-header">
                    <div class="plan_day">
                      <h2><?= $invest['plan_rate'] ?>%</h2>
                      <span><?= $invest['plan_type'] ?></span>
                    </div>
                    <div class="plan_day">
                      <h2><?= htmlspecialchars(explode(" ", $invest['duration_text'])[0]) ?></h2>
                      <span><?= htmlspecialchars(explode(" ", $invest['duration_text'])[1]) ?></span>
                    </div>
                  </div>
                  <div class="plan-details">
                    <div class="item"><span>Min Deposit</span>-<span>$<?= number_format($invest['plan_min']) ?></span></div>
                    <div class="item"><span>Max Deposit</span>-<span>$<?= number_format($invest['plan_max']) ?></span></div>
                    <div class="item"><span>Capital Return</span>-<span>Yes</span></div>
                    <div class="item"><span>Total Return</span>-<span><?= $invest['total'] ?>%</span></div>
                  </div>

                  <a href="#" data-toggle="modal" data-target="#depoModal"
                    data-resource="{&quot;id&quot;:7,&quot;name&quot;:&quot;Basic Plan&quot;,&quot;minimum&quot;:&quot;200&quot;,&quot;maximum&quot;:&quot;7000&quot;,&quot;fixed_amount&quot;:&quot;0&quot;,&quot;interest&quot;:&quot;1.5&quot;,&quot;interest_status&quot;:&quot;1&quot;,&quot;times&quot;:&quot;24&quot;,&quot;status&quot;:&quot;1&quot;,&quot;featured&quot;:&quot;1&quot;,&quot;capital_back_status&quot;:&quot;0&quot;,&quot;lifetime_status&quot;:&quot;0&quot;,&quot;repeat_time&quot;:&quot;10&quot;,&quot;created_at&quot;:&quot;2021-04-23 03:31:13&quot;,&quot;updated_at&quot;:&quot;2021-05-17 22:53:56&quot;}"
                    class="btn btn-success investButton">Invest Now</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="depoModal" tabindex="-1" role="dialog" aria-hidden="true">

      <div class="modal-dialog" role="document">
        <div class="modal-content modal-content-bg">
          <div class="modal-header">
            <strong class="modal-title text-white" id="ModalLabel">
              At first sign in your account </strong>
            <a href="javascript:void(0)" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </a>
          </div>
          <form action="<?= $root ?>/user/plans" method="post" class="register">
            <input type="hidden" name="_token" value="0DI0kMOBNY3bUeI2Pt0ohYKyAlF44jwPb8z1eQjf">
            <div class="modal-footer">
              <a href="<?= $root ?>/login" type="button" class="cmn-btn btn-md w-100 text-center">At first
                sign in your account</a>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- footer section start -->
    <?php include "../master/footer.php" ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->


  <script>
    (function($) {
      "use strict";
      $(document).on('click', '.investButton', function() {
        var data = $(this).data('resource');
        var symbol = "$";
        var currency = "USD";

        $('#mySelect').empty();

        if (data.fixed_amount == '0') {
          $('.investAmountRenge').text(`invest: ${symbol}${data.minimum} - ${symbol}${data.maximum}`);
          $('.fixedAmount').val('');
          $('#fixedAmount').attr('readonly', false);


        } else {
          $('.investAmountRenge').text(`invest: ${symbol}${data.fixed_amount}`);
          $('.fixedAmount').val(data.fixed_amount);
          $('#fixedAmount').attr('readonly', true);

        }

        if (data.interest_status == '1') {
          $('.interestDetails').html(`<strong> Interest: ${data.interest} % </strong>`);
        } else {
          $('.interestDetails').html(`<strong> Interest: ${data.interest} ${currency}  </strong>`);
        }
        if (data.lifetime_status == '0') {
          $('.interestValidaty').html(
            `<strong>  per ${data.times} hours ,  ${data.repeat_time} times</strong>`);
        } else {
          $('.interestValidaty').html(
            `<strong>  per ${data.times} hours,  life time </strong>`);
        }

        $('.planName').text(data.name);
        $('.plan_id').val(data.id);
      });



    })(jQuery);
  </script>



</body>

</html>