<?php include "../backend/adminData.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="/crest/assets/images/logoIcon/crest-favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h5 class="text-center mb-4" style="color:#eee;">Admin Panel</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="#dashboard">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#users">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#transactions">Transactions</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#investments">Investments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wallets">Wallets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#tickets">Support Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#reports">Reports & Logs</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-10 ml-sm-auto">
                <!-- Dashboard Summary -->
                <section id="dashboard">
                    <h2>Dashboard</h2>
                    <div class="row">
                        <!-- Total Users Card -->
                        <div class="col-md-3">
                            <div class="card text-white bg-primary mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Users</h5>
                                    <p class="card-text"><?= $total_users ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Total Deposits Card -->
                        <div class="col-md-3">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Deposits</h5>
                                    <p class="card-text">$<?= number_format($total_deposits_amount) ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Total Withdrawals Card -->
                        <div class="col-md-3">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Withdrawals</h5>
                                    <p class="card-text">$<?= number_format($total_withdrawals_amount) ?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Active Investments Card -->
                        <div class="col-md-3">
                            <div class="card text-white bg-info mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Active Investments</h5>
                                    <p class="card-text"><?= $active_investments ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- User Management -->
                <section id="users">
                    <h2>User Management</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Referral</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_users as $user) : ?>
                                <tr data-user-id="<?= $user['id'] ?>">
                                    <td><?= $user['user_id'] ?></td>
                                    <td><?= $user['fname'] . " " . $user['lname'] ?></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= $user['ref'] ?></td>
                                    <td>
                                        <!-- Toggle status button with conditional classes -->
                                        <button class="btn btn-sm toggle-status <?= ($user['status'] == 'active') ? 'btn-success' : 'btn-danger' ?>"
                                            data-status="<?= $user['status'] ?>"
                                            data-user-id="<?= $user['id'] ?>">
                                            <?= ($user['status'] == 'active') ? 'Active' : 'Blocked' ?>
                                        </button>
                                    </td>
                                    <td>
                                        <!-- Edit and Delete buttons remain the same -->
                                        <button class="btn btn-sm btn-primary edit-user" data-user='<?= htmlspecialchars(json_encode($user), ENT_QUOTES, 'UTF-8') ?>'>Edit</button>
                                        <button class="btn btn-sm btn-danger delete-user" data-user-id="<?= $user['id'] ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>

                <!-- User Edit Modal -->
                <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="editUserForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">Edit User Info</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Hidden field for user id -->
                                    <input type="hidden" name="user_id" id="user_id">
                                    <div class="form-group">
                                        <label for="fname">First Name</label>
                                        <input type="text" name="fname" id="fname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="lname">Last Name</label>
                                        <input type="text" name="lname" id="lname" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" id="phone" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <input type="text" name="country" id="country" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="zip">ZIP</label>
                                        <input type="text" name="zip" id="zip" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <input type="text" name="city" id="city" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <input type="text" name="state" id="state" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="pic">Picture URL</label>
                                        <input type="text" name="pic" id="pic" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Transactions Management -->
                <section id="transactions">
                    <h2>Transactions</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Transaction ID</th>
                                <th>User</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Dollar value</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_transactions as $transac) : ?>
                                <tr data-transac-id="<?= $transac['id'] ?>" data-trans-type="<?= $transac['transaction_type'] ?>">
                                    <td><?= $transac['transac_id'] ?></td>
                                    <td><?= $transac['user_id'] ?></td>
                                    <td><?= ucfirst($transac['type']) ?></td>
                                    <td><?= number_format($transac['amount'], 5) ?> <?= $transac['currency'] ?></td>
                                    <td>
                                        <?php if ($transac['transaction_type'] === 'withdrawal'): ?>
                                            <span style="color:red;">- $<?= number_format($transac['dol_val'], 2) ?></span>
                                        <?php else: ?>
                                            <span style="color:green;">$<?= number_format($transac['dol_val'], 2) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php
                                        $status = strtolower($transac['status']);
                                        if ($status == 'success') {
                                            $badgeClass = 'badge badge-success';
                                        } elseif ($status == 'pending') {
                                            $badgeClass = 'badge badge-warning';
                                        } elseif ($status == 'failed') {
                                            $badgeClass = 'badge badge-danger';
                                        } else {
                                            $badgeClass = 'badge badge-secondary';
                                        }
                                        ?>
                                        <span class="<?= $badgeClass ?>"><?= ucfirst($status) ?></span>
                                    </td>
                                    <td><?= date("Y-m-d H:i:s", strtotime($transac['datetime'])) ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-info view-transac" data-transac='<?= htmlspecialchars(json_encode($transac), ENT_QUOTES, "UTF-8") ?>'>View</button>
                                        <button class="btn btn-sm btn-primary edit-transac" data-transac='<?= htmlspecialchars(json_encode($transac), ENT_QUOTES, "UTF-8") ?>'>Edit</button>
                                        <button class="btn btn-sm btn-danger delete-transac" data-transac-id="<?= $transac['id'] ?>" data-trans-type="<?= $transac['transaction_type'] ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>

                <!-- Edit Transaction Modal -->
                <div class="modal fade" id="editTransacModal" tabindex="-1" role="dialog" aria-labelledby="editTransacModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="editTransacForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editTransacModalLabel">Edit Transaction</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Hidden fields for transaction ID and type -->
                                    <input type="hidden" name="trans_id" id="edit_trans_id">
                                    <input type="hidden" name="trans_type" id="edit_trans_type">

                                    <div class="form-group">
                                        <label for="edit_transac_id">Transaction ID</label>
                                        <input type="text" class="form-control" id="edit_transac_id" name="transac_id" readonly>
                                    </div>

                                    <!-- Separate Amount field -->
                                    <div class="form-group">
                                        <label for="edit_amount">Amount</label>
                                        <input type="text" class="form-control" id="edit_amount" name="amount">
                                    </div>

                                    <!-- Separate Dollar Value field -->
                                    <div class="form-group">
                                        <label for="edit_dol_val">Dollar Value</label>
                                        <input type="text" class="form-control" id="edit_dol_val" name="dol_val">
                                    </div>

                                    <div class="form-group">
                                        <label for="edit_address">Address</label>
                                        <input type="text" class="form-control" id="edit_address" name="address">
                                    </div>

                                    <div class="form-group">
                                        <label for="edit_status">Status</label>
                                        <select class="form-control" id="edit_status" name="status">
                                            <option value="pending">pending</option>
                                            <option value="success">approve</option>
                                            <option value="failed">decline</option>
                                        </select>
                                    </div>
                                    <!-- Add additional fields as necessary -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- View Transaction Modal -->
                <div class="modal fade" id="viewTransacModal" tabindex="-1" role="dialog" aria-labelledby="viewTransacModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="viewTransacModalLabel" class="modal-title">Transaction Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <!-- Display every data field in a table layout -->
                                <table class="table table-borderless">
                                    <tr>
                                        <th>Transaction ID:</th>
                                        <td id="view_transac_id"></td>
                                    </tr>
                                    <tr>
                                        <th>Type:</th>
                                        <td id="view_trans_type"></td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td id="view_status"></td>
                                    </tr>
                                    <tr>
                                        <th>Date:</th>
                                        <td id="view_datetime"></td>
                                    </tr>
                                    <tr>
                                        <th>Amount:</th>
                                        <td>$<span id="view_amount"></span></td>
                                    </tr>
                                    <tr>
                                        <th>User ID:</th>
                                        <td id="view_user_id"></td>
                                    </tr>
                                    <tr>
                                        <th>Currency:</th>
                                        <td id="view_currency"></td>
                                    </tr>
                                    <tr>
                                        <th>Address:</th>
                                        <td id="view_address"></td>
                                    </tr>
                                    <!-- Add more rows if you have additional fields -->
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Investments Management -->
                <section id="investments">
                    <h2>Investments</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Plan</th>
                                <th>Invested</th>
                                <th>Net Profit</th>
                                <th>Earned</th>
                                <th>Status</th>
                                <th>Duration</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Placeholder investments -->
                            <tr>
                                <td>Plan A</td>
                                <td>$1,000.00</td>
                                <td>$200.00</td>
                                <td>$150.00</td>
                                <td>Active</td>
                                <td>30 days</td>
                            </tr>
                            <tr>
                                <td>Plan B</td>
                                <td>$2,000.00</td>
                                <td>$500.00</td>
                                <td>$500.00</td>
                                <td>Ended</td>
                                <td>60 days</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Wallet Management -->
                <section id="wallets">
                    <h2>Wallets</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Limits</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Placeholder wallets -->
                            <tr>
                                <td>1</td>
                                <td>Deposit Wallet</td>
                                <td>$10 - $10,000</td>
                                <td>addr_001</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Withdrawal Wallet</td>
                                <td>$20 - $5,000</td>
                                <td>addr_002</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Support & Tickets -->
                <section id="tickets">
                    <h2>Support Tickets</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Placeholder tickets -->
                            <tr>
                                <td>101</td>
                                <td>John Doe</td>
                                <td>Issue with deposit</td>
                                <td>Open</td>
                                <td>2025-01-03</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Reports & Logs -->
                <section id="reports">
                    <h2>Reports & Logs</h2>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>Daily Activity</h5>
                            <p>All systems operational; no anomalies reported.</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5>System Logs</h5>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // --- Toggle Status ---
            $('.toggle-status').click(function() {
                var btn = $(this);
                var userId = btn.data('user-id');
                var currentStatus = btn.data('status');
                // Decide new status based on the current one
                var newStatus = (currentStatus === 'active') ? 'blocked' : 'active';

                $.post('../backend/adminActions.php/updateUser.php', {
                    action: 'updateStatus',
                    user_id: userId,
                    status: newStatus
                }, function(response) {
                    if (response.status === 'success') {
                        btn.data('status', newStatus);
                        // Update button text and classes accordingly
                        if (newStatus === 'active') {
                            btn.removeClass('btn-danger').addClass('btn-success');
                            btn.text('Active');
                        } else {
                            btn.removeClass('btn-success').addClass('btn-danger');
                            btn.text('Blocked');
                        }
                    } else {
                        alert(response.message);
                    }
                }, 'json');
            });

            // --- Open Edit Modal and Fill Data ---
            $('.edit-user').click(function() {
                var userData = $(this).data('user');
                // Fill modal form fields using userData
                $('#user_id').val(userData.id);
                $('#fname').val(userData.fname);
                $('#lname').val(userData.lname);
                $('#email').val(userData.email);
                $('#phone').val(userData.phone);
                $('#country').val(userData.country);
                $('#address').val(userData.address);
                $('#zip').val(userData.zip);
                $('#city').val(userData.city);
                $('#state').val(userData.state);
                $('#pic').val(userData.pic);
                // Show modal
                $('#editUserModal').modal('show');
            });

            // --- Submit Edit Form with AJAX ---
            $('#editUserForm').submit(function(e) {
                e.preventDefault();
                $.post('../backend/adminActions.php/updateUser.php', $(this).serialize() + '&action=updateInfo', function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        // Optionally, refresh the page or update the table row with new info without reloading
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }, 'json');
            });

            // --- Delete User with Confirmation ---
            $('.delete-user').click(function() {
                var userId = $(this).data('user-id');
                if (confirm("Are you sure you want to delete this user?")) {
                    $.post('../backend/adminActions.php/deleteUser.php', {
                        user_id: userId
                    }, function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    }, 'json');
                }
            });

            // --- Open View Transaction Modal and populate every field ---
            $('.view-transac').click(function() {
                var transac = $(this).data('transac');
                $('#view_transac_id').text(transac.transac_id);
                $('#view_trans_type').text(transac.transaction_type);
                $('#view_status').text(transac.status);
                $('#view_datetime').text(transac.datetime);
                $('#view_amount').text(parseFloat(transac.dol_val).toFixed(2));
                $('#view_user_id').text(transac.user_id);
                $('#view_currency').text(transac.currency);
                $('#view_address').text(transac.address);
                $('#viewTransacModal').modal('show');
            });

            // --- Open Edit Transaction Modal and populate fields ---
            $('.edit-transac').click(function() {
                var transac = $(this).data('transac');
                $('#edit_trans_id').val(transac.id);
                $('#edit_trans_type').val(transac.transaction_type);
                $('#edit_transac_id').val(transac.transac_id);
                $('#edit_amount').val(transac.amount);
                $('#edit_dol_val').val(transac.dol_val);
                $('#edit_address').val(transac.address);
                // Set the select value based on the transaction status (converted to lowercase)
                $('#edit_status').val(transac.status.toLowerCase());
                $('#editTransacModal').modal('show');
            });

            // --- Submit Edit Transaction Form via AJAX ---
            $('#editTransacForm').submit(function(e) {
                e.preventDefault();
                $.post('../backend/adminActions.php/updateTransac.php', $(this).serialize(), function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }, 'json');
            });

            // --- Delete Transaction with confirmation ---
            $('.delete-transac').click(function() {
                var trans_id = $(this).data('transac-id');
                var trans_type = $(this).data('trans-type');
                if (confirm("Are you sure you want to delete this transaction?")) {
                    $.post('../backend/adminActions.php/deleteTransac.php', {
                        trans_type: trans_type,
                        trans_id: trans_id
                    }, function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    }, 'json');
                }
            });
        });
    </script>
</body>

</html>