$(document).ready(function () {
  // Initialize DataTables on all tables on the page
  $("table").DataTable({
    pageLength: 10,
    // Optional: add more DataTables settings here, e.g., language customization, ordering, etc.
  });

  // --- Toggle Status ---
  $(".toggle-status").click(function () {
    var btn = $(this);
    var userId = btn.data("user-id");
    var currentStatus = btn.data("status");
    // Decide new status based on the current one
    var newStatus = currentStatus === "active" ? "blocked" : "active";

    $.post(
      "../backend/adminActions/updateUser.php",
      {
        action: "updateStatus",
        user_id: userId,
        status: newStatus,
      },
      function (response) {
        if (response.status === "success") {
          btn.data("status", newStatus);
          // Update button text and classes accordingly
          if (newStatus === "active") {
            btn.removeClass("btn-danger").addClass("btn-success");
            btn.text("Active");
          } else {
            btn.removeClass("btn-success").addClass("btn-danger");
            btn.text("Blocked");
          }
        } else {
          alert(response.message);
        }
      },
      "json"
    );
  });

  // --- Open Edit Modal and Fill Data ---
  $(".edit-user").click(function () {
    var userData = $(this).data("user");
    // Fill modal form fields using userData
    $("#user_id").val(userData.id);
    $("#fname").val(userData.fname);
    $("#lname").val(userData.lname);
    $("#email").val(userData.email);
    $("#phone").val(userData.phone);
    $("#country").val(userData.country);
    $("#address").val(userData.address);
    $("#zip").val(userData.zip);
    $("#city").val(userData.city);
    $("#state").val(userData.state);
    $("#pic").val(userData.pic);
    // Show modal
    $("#editUserModal").modal("show");
  });

  // --- Open View User Modal and Fill Data ---
  $(".view-user").click(function () {
    var userData = $(this).data("user");
    // Fill modal fields using userData
    $("#view_user_id").text(userData.id);
    $("#view_fname").text(userData.fname);
    $("#view_lname").text(userData.lname);
    $("#view_email").text(userData.email);
    $("#view_phone").text(userData.phone);
    $("#view_country").text(userData.country);
    $("#view_address").text(userData.address);
    $("#view_zip").text(userData.zip);
    $("#view_city").text(userData.city);
    $("#view_state").text(userData.state);
    $("#view_pic").text(userData.pic);
    // Show modal
    $("#viewUserModal").modal("show");
  });

  // --- Submit Edit Form with AJAX ---
  $("#editUserForm").submit(function (e) {
    e.preventDefault();
    $.post(
      "../backend/adminActions/updateUser.php",
      $(this).serialize() + "&action=updateInfo",
      function (response) {
        if (response.status === "success") {
          alert(response.message);
          // Optionally, refresh the page or update the table row with new info without reloading
          location.reload();
        } else {
          alert(response.message);
        }
      },
      "json"
    );
  });

  // --- Delete User with Confirmation ---
  $(".delete-user").click(function () {
    var userId = $(this).data("user-id");
    if (confirm("Are you sure you want to delete this user?")) {
      $.post(
        "../backend/adminActions/deleteUser.php",
        {
          user_id: userId,
        },
        function (response) {
          if (response.status === "success") {
            alert(response.message);
            location.reload();
          } else {
            alert(response.message);
          }
        },
        "json"
      );
    }
  });

  // --- Open View Transaction Modal and populate every field ---
  $(document).on("click", ".view-transac", function () {
    var transac = $(this).data("transac");
    $("#view_transac_id").text(transac.transac_id);
    $("#view_trans_type").text(transac.transaction_type);
    $("#view_status").text(transac.status);
    $("#view_datetime").text(transac.datetime);
    $("#view_amount").text(parseFloat(transac.dol_val).toFixed(2));
    $("#view_user_id").text(transac.user_id);
    $("#view_currency").text(transac.currency);
    $("#view_address").text(transac.address);
    $("#viewTransacModal").modal("show");
  });

  // --- Open Edit Transaction Modal and populate fields ---
  $(document).on("click", ".edit-transac", function () {
    var transac = $(this).data("transac");
    $("#edit_trans_id").val(transac.id);
    $("#edit_trans_type").val(transac.transaction_type);
    $("#edit_transac_id").val(transac.transac_id);
    $("#edit_amount").val(transac.amount);
    $("#edit_currency_span").text(`(${transac.currency})`);
    $("#edit_dol_val").val(transac.dol_val);
    $("#edit_address").val(transac.address);
    $("#edit_status").val(transac.status.toLowerCase());
    $("#editTransacModal").modal("show");
  });

  // --- Submit Edit Transaction Form via AJAX ---
  $("#editTransacForm").submit(function (e) {
    e.preventDefault();
    $.post(
      "../backend/adminActions/updateTransac.php",
      $(this).serialize(),
      function (response) {
        if (response.status === "success") {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
        }
      },
      "json"
    );
  });

  // --- Delete Transaction with confirmation ---
  $(document).on("click", ".delete-transac", function () {
    var trans_id = $(this).data("transac-id");
    var trans_type = $(this).data("trans-type");
    if (confirm("Are you sure you want to delete this transaction?")) {
      $.post(
        "../backend/adminActions/deleteTransac.php",
        {
          trans_type: trans_type,
          trans_id: trans_id,
        },
        function (response) {
          if (response.status === "success") {
            alert(response.message);
            location.reload();
          } else {
            alert(response.message);
          }
        },
        "json"
      );
    }
  });

  // Filter transactions by type
  $("#filterTransacType").change(function () {
    var selectedType = $(this).val();
    // Loop through each row in the transactions table
    $("#transactions tbody tr").each(function () {
      var rowType = $(this).data("trans-type"); // Should be 'deposit' or 'withdrawal'
      if (selectedType === "all" || selectedType === rowType) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });

  // --- Open View Investment Modal and populate fields ---
  $(document).on("click", ".view-invest", function () {
    var invest = $(this).data("invest");
    $("#viewInvest_id").text(invest.invest_id);
    $("#viewInvest_plan").text(`${invest.plan_name} plan`);
    $("#viewInvest_user").text(invest.user);
    $("#viewInvest_amount").text(parseFloat(invest.amount).toFixed(2));
    $("#viewInvest_earned").text(parseFloat(invest.earned).toFixed(2));
    $("#viewInvest_expected").text(parseFloat(invest.expected).toFixed(2));
    $("#viewInvest_duration").text(invest.num_of_days);
    $("#viewInvest_start_date").text(invest.start_date);
    $("#viewInvest_end_date").text(invest.end_date);
    $("#viewInvest_status").text(invest.status);
    $("#viewInvestModal").modal("show");
  });

  // --- Open Edit Investment Modal and populate fields ---
  $(document).on("click", ".edit-invest", function () {
    var invest = $(this).data("invest");
    $("#editInvest_id").val(invest.invest_id);
    $("#editInvest_amount").val(invest.amount);
    $("#editInvest_earned").val(invest.earned);
    $("#editInvest_expected").val(invest.expected);
    $("#editInvest_status").val(invest.status.toLowerCase());
    $("#editInvest_num_of_days").val(invest.num_of_days);
    $("#editInvestModal").modal("show");
  });

  // --- Submit Edit Investment Form via AJAX ---
  $("#editInvestForm").submit(function (e) {
    e.preventDefault();
    $.post(
      "../backend/adminActions/updateInvest.php",
      $(this).serialize(),
      function (response) {
        if (response.status === "success") {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
        }
      },
      "json"
    );
  });

  // --- Delete Investment with Confirmation ---
  $(document).on("click", ".delete-invest", function () {
    var invest_id = $(this).data("invest-id");
    if (confirm("Are you sure you want to delete this investment?")) {
      $.post(
        "../backend/adminActions/deleteInvest.php",
        {
          invest_id: invest_id,
        },
        function (response) {
          if (response.status === "success") {
            alert(response.message);
            location.reload();
          } else {
            alert(response.message);
          }
        },
        "json"
      );
    }
  });

  // --- Open View Ticket Modal and populate fields ---
  $(document).on("click", ".view-ticket", function () {
    var ticket = $(this).data("ticket");
    $("#viewTicket_id").text(ticket.id);
    $("#viewTicket_user").text(ticket.user_name);
    $("#viewTicket_subject").text(ticket.subject);
    $("#viewTicket_message").text(ticket.message);
    if (ticket.image) {
      // Display image if available, adjust size as needed
      $("#viewTicket_image").html(
        '<img src="' +
          ticket.image +
          '" alt="Ticket Image" style="max-width:100%;">'
      );
    } else {
      $("#viewTicket_image").text("No image");
    }
    // Set status with proper casing
    $("#viewTicket_status").html(
      ticket.status
        ? ticket.status.charAt(0).toUpperCase() + ticket.status.slice(1)
        : ""
    );
    $("#viewTicket_created").text(ticket.created);
    $("#viewTicketModal").modal("show");
  });

  // --- Open Edit Ticket Modal and populate fields ---
  $(document).on("click", ".edit-ticket", function () {
    var ticket = $(this).data("ticket");
    $("#editTicket_id").val(ticket.id);
    $("#editTicket_status").val(ticket.status.toLowerCase());
    $("#editTicketModal").modal("show");
  });

  // --- Submit Edit Ticket Form via AJAX ---
  $("#editTicketForm").submit(function (e) {
    e.preventDefault();
    $.post(
      "../backend/adminActions/updateTicket.php",
      $(this).serialize(),
      function (response) {
        if (response.status === "success") {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
        }
      },
      "json"
    );
  });

  // --- Delete Ticket with confirmation ---
  $(document).on("click", ".delete-ticket", function () {
    var ticket_id = $(this).data("ticket-id");
    if (confirm("Are you sure you want to delete this ticket?")) {
      $.post(
        "../backend/adminActions/deleteTicket.php",
        {
          ticket_id: ticket_id,
        },
        function (response) {
          if (response.status === "success") {
            alert(response.message);
            location.reload();
          } else {
            alert(response.message);
          }
        },
        "json"
      );
    }
  });

  // Create Wallet AJAX
  $(document).on("submit", "#createWalletForm", function (e) {
    e.preventDefault();
    $.post(
      "../backend/adminActions/createWallet.php",
      $(this).serialize(),
      function (response) {
        if (response.status === "success") {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
        }
      },
      "json"
    );
  });

  // Open Edit Wallet Modal and populate fields
  $(document).on("click", ".edit-wallet", function () {
    var wallet = $(this).data("wallet");
    $("#editWallet_id").val(wallet.wallet_id);
    $("#editWallet_name").val(wallet.wallet_name);
    $("#editWallet_short").val(wallet.wallet_short);
    $("#editWallet_min").val(wallet.wallet_min);
    $("#editWallet_max").val(wallet.wallet_max);
    $("#editWallet_address").val(wallet.wallet_address);
    $("#editWalletModal").modal("show");
  });

  // Edit Wallet AJAX
  $(document).on("submit", "#editWalletForm", function (e) {
    e.preventDefault();
    $.post(
      "../backend/adminActions/updateWallet.php",
      $(this).serialize(),
      function (response) {
        if (response.status === "success") {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
        }
      },
      "json"
    );
  });

  // Delete Wallet AJAX
  $(document).on("click", ".delete-wallet", function () {
    var wallet_id = $(this).data("wallet-id");
    if (confirm("Are you sure you want to delete this wallet?")) {
      $.post(
        "../backend/adminActions/deleteWallet.php",
        {
          wallet_id: wallet_id,
        },
        function (response) {
          if (response.status === "success") {
            alert(response.message);
            location.reload();
          } else {
            alert(response.message);
          }
        },
        "json"
      );
    }
  });

  // Plan Management AJAX
  // Create Plan AJAX
  $(document).on("submit", "#createPlanForm", function (e) {
    e.preventDefault();
    $.post(
      "../backend/adminActions/createPlan.php",
      $(this).serialize(),
      function (response) {
        if (response.status === "success") {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
        }
      },
      "json"
    );
  });

  // Open Edit Plan Modal and populate fields
  $(document).on("click", ".edit-plan", function () {
    var plan = $(this).data("plan");
    $("#editPlan_id").val(plan.plan_id);
    $("#editPlan_name").val(plan.plan_name);
    $("#editPlan_type").val(plan.plan_type);
    $("#editPlan_rate").val(plan.plan_rate);
    $("#editPlan_duration").val(plan.duration);
    $("#editPlan_duration_text").val(plan.duration_text);
    $("#editPlan_min").val(plan.plan_min);
    $("#editPlan_max").val(plan.plan_max);
    $("#editPlanModal").modal("show");
  });

  // Edit Plan AJAX
  $(document).on("submit", "#editPlanForm", function (e) {
    e.preventDefault();
    $.post(
      "../backend/adminActions/updatePlan.php",
      $(this).serialize(),
      function (response) {
        if (response.status === "success") {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
        }
      },
      "json"
    );
  });

  // Delete Plan AJAX
  $(document).on("click", ".delete-plan", function () {
    var plan_id = $(this).data("plan-id");
    if (confirm("Are you sure you want to delete this plan?")) {
      $.post(
        "../backend/adminActions/deletePlan.php",
        {
          plan_id: plan_id,
        },
        function (response) {
          if (response.status === "success") {
            alert(response.message);
            location.reload();
          } else {
            alert(response.message);
          }
        },
        "json"
      );
    }
  });

  //  Credit User Ajax
  $(document).on("submit", "#deposit_user", function (e) {
    e.preventDefault();
    $.ajax({
      url: "../backend/adminActions/creditUser.php",
      type: "POST",
      data: {
        user_id: $("#dep_user_id").val(),
        amount: $("#dep_user_amount").val(),
        dol_val: $("#dep_user_amount").val(),
        currency: "USD",
        type: "bonus",
        address: "N/A",
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
        }
      },
    });
  });

  //  Debit User Ajax
  $(document).on("submit", "#withdraw_user", function (e) {
    e.preventDefault();
    $.ajax({
      url: "../backend/adminActions/debitUser.php",
      type: "POST",
      data: {
        user_id: $("#with_user_id").val(),
        amount: $("#with_user_amount").val(),
        dol_val: $("#with_user_amount").val(),
        currency: "USD",
        type: "withdraw",
        address: "N/A",
      },
      dataType: "json",
      success: function (response) {
        if (response.status === "success") {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
        }
      },
    });
  });
});
