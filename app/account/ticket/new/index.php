<!DOCTYPE html>
<html lang="en">

<?php include "../../../backend/udata.php" ?>
<?php include "../../../master/head.php" ?>

<body>

  <!-- scroll-to-top start -->
  <div class="scroll-to-top">
    <span class="scroll-icon"><i class="fa fa-rocket" aria-hidden="true"></i></span>
  </div>
  <!-- scroll-to-top end -->

  <div class="full-wh">
    <!-- STAR ANIMATION -->
    <div class="bg-animation">
      <div id='stars'></div>
      <div id='stars2'></div>
      <div id='stars3'></div>
      <div id='stars4'></div>
    </div>
    <!-- / STAR ANIMATION -->
  </div>

  <div class="page-wrapper">
    <!-- header section start -->
    <?php include "../../../master/nav.php" ?>
    <!-- header section end -->

    <!-- inner hero start -->
    <section class="inner-hero bg_img" data-background="black">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2 class="page-title">Welcome Back!</h2>
            <ul class="page-breadcrumb">
              <li><a href="../../../dashboard">User</a></li>
              <li>Support Tickets</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <!-- inner hero end -->

    <!-- New Ticket Form -->
    <section class="cmn-section">
      <div class="container">
        <div class="card">
          <!-- You can generate a ticket_id on the server side; here we assume it will be handled in createTicket.php -->
          <div class="card-header">
            <div class="col-md-12 mb-30">
              <ul class="right">
                <li>
                  <a href="../" class="btn float-right btn-dark" data-toggle="tooltip" data-placement="top" title="My Support Ticket">
                    <i class="fa fa-eye"></i> See All </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="card-body">
            <div class="row mb-60-80">
              <div class="col-md-12 mb-30">
                <form id="ticketForm" action="../../../backend/actions/createTicket.php" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label for="name">Name</label>
                      <!-- Name is readonly; fills from session user data -->
                      <input type="text" name="fullname" value="<?= htmlspecialchars($user['fname'] . ' ' . $user['lname']) ?>" class="form-control form-control-lg" placeholder="Enter Name" required readonly>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="email">Email address</label>
                      <!-- Email is readonly; fills from session user data -->
                      <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" class="form-control form-control-lg" placeholder="Enter your Email" required readonly>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-md-12">
                      <label for="subject">Subject</label>
                      <input type="text" name="subject" value="" class="form-control form-control-lg" placeholder="Subject" required>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12 form-group">
                      <label for="inputMessage">Message</label>
                      <textarea name="message" id="inputMessage" rows="12" class="form-control" placeholder="Your message here..." required></textarea>
                    </div>
                  </div>
                  <div class="row form-group">
                    <div class="col-sm-12">
                      <label for="inputAttachments">Attachments</label>
                    </div>
                    <div class="col-9 file-upload">
                      <input type="file" name="file" id="inputAttachments" class="form-control form-control" />
                      <div id="fileUploadsContainer"></div>
                    </div>
                    <div class="col-sm-12 ticket-attachments-message text-muted">
                      Allowed File Extensions: .jpg, .jpeg, .png, .pdf, .doc, .docx
                    </div>
                  </div>
                  <div class="row form-group justify-content-center">
                    <div class="col-md-12">
                      <button class="btn cmn-btn w-100 bg-3 text-center mt-3" type="submit" id="ticketSubmitButton">
                        Submit Now
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div> <!-- card-body end -->
        </div> <!-- card end -->
      </div> <!-- container end -->
    </section>

    <!-- footer section start -->
    <?php include "../../../master/footer.php" ?>
    <!-- footer section end -->
  </div> <!-- page-wrapper end -->

  <!-- jQuery library -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/jquery-3.5.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/bootstrap.bundle.min.js"></script>
  <!-- slick slider js -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/slick.min.js"></script>
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/vendor/wow.min.js"></script>
  <!-- custom js -->
  <script src="https://assetbase-trading.com/assets/templates/bit_gold/js/app.js"></script>
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
    "use strict";
    $(document).ready(function() {
      $("#ticketForm").on("submit", function(e) {
        e.preventDefault();
        var submitButton = $("#ticketSubmitButton");
        submitButton.prop('disabled', true).text("Submitting...");
        var formData = new FormData(this);

        $.ajax({
          url: $(this).attr("action"),
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function(resp) {
            var data = (typeof resp === "object") ? resp : JSON.parse(resp);
            notify(data.status, data.message);
            submitButton.prop('disabled', false).text("Submit Now");
          },
          error: function(xhr, status, error) {
            notify("error", "Error: " + error);
            submitButton.prop('disabled', false).text("Submit Now");
          }
        });
      });
    });
  </script>

  <script>
    "use strict";
    $(document).on("change", "#inputAttachments", function() {
      var container = $("#fileUploadsContainer");
      // Optionally, you can preview or add more file inputs if needed.
      container.html('');
      for (var i = 0; i < this.files.length; i++) {
        container.append('<p>' + this.files[i].name + '</p>');
      }
    });
  </script>

</body>

</html>