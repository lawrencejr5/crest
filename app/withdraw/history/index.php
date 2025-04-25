<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en">

<?php include "../../backend/udata.php" ?>
<?php include "../../master/head.php" ?>


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
    <?php include "../../master/nav.php" ?>
    <!-- header-section end  -->

    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="black">


      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Welcome Back!</h2>
            <ul class="page-breadcrumb">
              <li><a href="../../dashboard">User</a></li>
              <li>Withdraw Log</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->
    <section class="cmn-section pt-60">
      <div class="container">
        <div class="row justify-content-center mt-2">
          <div class="col-md-12">
            <div class="right float-right mb-5">
              <a href="/crest/app/withdraw" class="btn cmn-btn">
                Withdraw Now
              </a>
            </div>
          </div>
          <div class="col-lg-12 ">

            <div class="table-responsive--md">
              <table class="table style--two">
                <thead>
                  <tr>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Type</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Dollar Value</th>
                    <th scope="col">Status</th>
                    <th scope="col">Date/Time</th>
                    <!-- <th scope="col"> MORE</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php if (isset($user_withdrawals) && count($user_withdrawals) > 0): ?>
                    <?php foreach ($user_withdrawals as $withdrawal): ?>
                      <tr>
                        <td data-label="Transaction ID">#<?php echo htmlspecialchars($withdrawal['transac_id']); ?></td>
                        <td data-label="Type"><?php echo htmlspecialchars($withdrawal['type']); ?></td>
                        <td data-label="Amount"> <?= htmlspecialchars($withdrawal['amount'] . $withdrawal['currency']) ?> </td>
                        <td data-label="Dollar Value"><span class="text-danger">- $<?= htmlspecialchars($withdrawal['dol_val']) ?></span></td>
                        <td data-label="Status">
                          <?php if ($withdrawal['status'] == "success"): ?>
                            <span class="text-success"><?= htmlspecialchars($withdrawal['status']) ?></span>
                          <?php elseif ($withdrawal['status'] == "pending"): ?>
                            <span class="text-warning"><?= htmlspecialchars($withdrawal['status']) ?></span>
                          <?php else: ?>
                            <span class="text-danger"><?= htmlspecialchars($withdrawal['status']) ?></span>
                          <?php endif; ?>
                        </td>
                        <td data-label="Date/Time"><?php echo isset($withdrawal['datetime']) ? htmlspecialchars($withdrawal['datetime']) : 'N/A'; ?></td>
                        <!-- <td>
                          <a href="details.php?id=<?php echo htmlspecialchars($withdrawal['id']); ?>" class="btn btn-sm btn-info">View</a>
                        </td> -->
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td class="text-muted text-center" colspan="9">No Data Found!</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>


            </div>


          </div>
        </div>
      </div>
    </section>




    <div id="approveModal" class="modal fade" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="list-group">
              <li class="list-group-item dark-bg">Transactions : <span class="trx"></span></li>
              <li class="list-group-item dark-bg">Admin Feedback : <span class="feedback"></span></li>
            </ul>
            <ul class="list-group withdraw-detail mt-1">
            </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>



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
    $(document).ready(function() {
      "use strict";
      $('.approveBtn').on('click', function() {
        var modal = $('#approveModal');
        modal.find('.trx').text($(this).data('transactions'));
        modal.find('.feedback').text($(this).data('admin_feedback'));
        var list = [];
        var details = Object.entries($(this).data('info'));

        var ImgPath = "https://assetbase-trading.com/assets/images/verify/withdraw/";
        var singleInfo = '';
        for (var i = 0; i < details.length; i++) {
          if (details[i][1].type == 'file') {
            singleInfo += `<li class="list-group-item">
                                            <span class="font-weight-bold "> ${details[i][0].replaceAll('_', " ")} </span> : <img src="${ImgPath}/${details[i][1].field_name}" alt="..." class="w-100">
                                        </li>`;
          } else {
            singleInfo += `<li class="list-group-item">
                                            <span class="font-weight-bold "> ${details[i][0].replaceAll('_', " ")} </span> : <span class="font-weight-bold ml-3">${details[i][1].field_name}</span> 
                                        </li>`;
          }
        }

        if (singleInfo) {
          modal.find('.withdraw-detail').html(`<br><strong class="my-3">Payment Information</strong>  ${singleInfo}`);
        } else {
          modal.find('.withdraw-detail').html(`${singleInfo}`);
        }
        modal.modal('show');
      });
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