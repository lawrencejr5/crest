<?php include "../backend/adminData.php" ?>

<?php

function getFullname($uid)
{
    global $modules;
    $userData = $modules->getUserData($uid);
    if (!$userData || !is_array($userData)) {
        return "None";
    }
    return $userData['fname'] . " " . $userData['lname'];
}

function getPlanName($pid)
{
    global $modules;
    $planData = $modules->getPlan($pid);
    if (!$planData || !is_array($planData)) {
        return '';
    }
    return $planData['plan_name'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="/crest/assets/images/logoIcon/crest-favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="style.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.4/css/responsive.dataTables.min.css">
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
                            <a class="nav-link" href="#tickets">Support Tickets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#wallets">Wallets</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#plans">Plans</a>
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
                    <table class="table table-striped table-sm dt-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Referral</th>
                                <th>Date joined</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_users as $user) : ?>
                                <tr data-user-id="<?= $user['id'] ?>">
                                    <td><?= $user['user_id'] ?></td>
                                    <td><a href="./userDetails.php?user_id=<?= $user['user_id'] ?>"><?= $user['fname'] . " " . $user['lname'] ?></a></td>
                                    <td><?= $user['email'] ?></td>
                                    <td><?= getFullname($user['ref']) ?></td>
                                    <td><?= $user['datetime'] ?></td>
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
                                        <button class="btn btn-sm btn-info view-user" data-user='<?= htmlspecialchars(json_encode($user), ENT_QUOTES, 'UTF-8') ?>'>View</button>
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

                <!-- View User Modal -->
                <div class="modal fade" id="viewUserModal" tabindex="-1" role="dialog" aria-labelledby="viewUserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="viewUserModalLabel" class="modal-title" style="color: #222;">User Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: #222;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: #222;">
                                <p><strong>User ID:</strong> <span id="view_user_id"></span></p>
                                <p><strong>First Name:</strong> <span id="view_fname"></span></p>
                                <p><strong>Last Name:</strong> <span id="view_lname"></span></p>
                                <p><strong>Email:</strong> <span id="view_email"></span></p>
                                <p><strong>Phone:</strong> <span id="view_phone"></span></p>
                                <p><strong>Country:</strong> <span id="view_country"></span></p>
                                <p><strong>Address:</strong> <span id="view_address"></span></p>
                                <p><strong>ZIP:</strong> <span id="view_zip"></span></p>
                                <p><strong>City:</strong> <span id="view_city"></span></p>
                                <p><strong>State:</strong> <span id="view_state"></span></p>
                                <p><strong>Picture URL:</strong> <span id="view_pic"></span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #b58e43; border: none;">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Transactions Management -->
                <section id="transactions">
                    <h2>Transactions</h2>
                    <!-- Transactions Filter -->
                    <div class="form-group" style="max-width: 200px;">
                        <label for="filterTransacType">Filter by type:</label>
                        <select id="filterTransacType" class="form-control">
                            <option value="all">All</option>
                            <option value="deposit">Deposits</option>
                            <option value="withdrawal">Withdrawals</option>
                        </select>
                    </div>
                    <table class="table table-striped table-sm dt-responsive">
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
                                    <td><a href="./userDetails.php?user_id=<?= $transac['user_id'] ?>"><?= getFullname($transac['user_id']) ?></a></td>
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
                                        <label for="edit_amount">Amount <span id="edit_currency_span">()</span></label>
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
                                <h5 id="viewTransacModalLabel" class="modal-title" style="color: #222;">Transaction Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: #222;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: #222;">
                                <p><strong>Transaction ID:</strong> <span id="view_transac_id"></span></p>
                                <p><strong>Type:</strong> <span id="view_trans_type"></span></p>
                                <p><strong>Status:</strong> <span id="view_status"></span></p>
                                <p><strong>Date:</strong> <span id="view_datetime"></span></p>
                                <p><strong>Amount:</strong> $<span id="view_amount"></span></p>
                                <p><strong>User ID:</strong> <span id="view_user_id"></span></p>
                                <p><strong>Currency:</strong> <span id="view_currency"></span></p>
                                <p><strong>Address:</strong> <span id="view_address"></span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #b58e43; border: none;">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Investments Management Section -->
                <section id="investments">
                    <h2>Investments</h2>
                    <table class="table table-striped table-sm dt-responsive">
                        <thead>
                            <tr>
                                <th>Investment ID</th>
                                <th>Plan</th>
                                <th>Investor</th>
                                <th>Invested</th>
                                <th>Net Profit</th>
                                <th>Earned</th>
                                <th>Status</th>
                                <th>Duration</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_investments as $invest) :
                                // Calculate net profit, if available (expected minus invested)
                                $netProfit = $invest['expected'] - $invest['amount'];
                                $status = strtolower($invest['status']);
                                $invest['plan_name'] = getPlanName($invest['plan_id']);
                                $invest['user'] = getFullname($invest['user_id']);
                            ?>
                                <tr data-invest-id="<?= $invest['invest_id'] ?>" data-invest='<?= htmlspecialchars(json_encode($invest), ENT_QUOTES, "UTF-8") ?>'>
                                    <td><?= $invest['invest_id'] ?></td>
                                    <td><a href="./userDetails.php?user_id=<?= $invest['user_id'] ?>"><?= getFullname($invest['user_id']) ?></a></td>
                                    <td><?= $invest['user'] ?></td>
                                    <td>$<?= number_format($invest['amount'], 2) ?></td>
                                    <td>$<?= number_format($invest['expected'], 2) ?></td>
                                    <td>$<?= number_format($invest['earned'], 2) ?></td>
                                    <td>
                                        <?php if ($status == 'active'): ?>
                                            <span style="color:green;"><?= ucfirst($status) ?></span>
                                        <?php elseif ($status == 'ended'): ?>
                                            <span style="color:grey;"><?= ucfirst($status) ?></span>
                                        <?php else: ?>
                                            <span><?= ucfirst($status) ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <td><?= $invest['num_of_days'] ?> days</td>
                                    <td>
                                        <button class="btn btn-sm btn-info view-invest" data-invest='<?= htmlspecialchars(json_encode($invest), ENT_QUOTES, "UTF-8") ?>'>View</button>
                                        <button class="btn btn-sm btn-primary edit-invest" data-invest='<?= htmlspecialchars(json_encode($invest), ENT_QUOTES, "UTF-8") ?>'>Edit</button>
                                        <button class="btn btn-sm btn-danger delete-invest" data-invest-id="<?= $invest['invest_id'] ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>

                <!-- View Investment Modal -->
                <div class="modal fade" id="viewInvestModal" tabindex="-1" role="dialog" aria-labelledby="viewInvestModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="viewInvestModalLabel" class="modal-title" style="color: #222;">Investment Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: #222;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: #222;">
                                <p><strong>Investment ID:</strong> <span id="viewInvest_id"></span></p>
                                <p><strong>User:</strong> <span id="viewInvest_user"></span></p>
                                <p><strong>Plan:</strong> <span id="viewInvest_plan" style="text-transform: capitalize;"></span></p>
                                <p><strong>Invested:</strong> $<span id="viewInvest_amount"></span></p>
                                <p><strong>Earned:</strong> $<span id="viewInvest_earned"></span></p>
                                <p><strong>Net Profit:</strong> $<span id="viewInvest_expected"></span></p>
                                <p><strong>Duration:</strong> <span id="viewInvest_duration"></span> days</p>
                                <p><strong>Start Date:</strong> <span id="viewInvest_start_date"></span></p>
                                <p><strong>End Date:</strong> <span id="viewInvest_end_date"></span></p>
                                <p><strong>Status:</strong> <span id="viewInvest_status"></span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #b58e43; border: none;">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Investment Modal -->
                <div class="modal fade" id="editInvestModal" tabindex="-1" role="dialog" aria-labelledby="editInvestModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="editInvestForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editInvestModalLabel">Edit Investment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Hidden field for investment ID -->
                                    <input type="hidden" name="invest_id" id="editInvest_id">
                                    <div class="form-group">
                                        <label for="editInvest_amount">Invested Amount (USD)</label>
                                        <input type="text" class="form-control" id="editInvest_amount" name="amount" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editInvest_earned">Earned (USD)</label>
                                        <input type="text" class="form-control" id="editInvest_earned" name="earned" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editInvest_expected">Expected (USD)</label>
                                        <input type="text" class="form-control" id="editInvest_expected" name="expected" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editInvest_status">Status</label>
                                        <select class="form-control" id="editInvest_status" name="status">
                                            <option value="active">Active</option>
                                            <option value="ended">Ended</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="editInvest_num_of_days">Number of Days</label>
                                        <input type="text" class="form-control" id="editInvest_num_of_days" name="num_of_days" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Support & Tickets -->
                <section id="tickets">
                    <h2>Support Tickets</h2>
                    <table class="table table-striped table-sm dt-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_tickets as $ticket) :
                                // Assume ticket has fields: id, user_id, subject, message, status, created, and optionally image
                                $status = strtolower($ticket['status']);
                                // Determine a badge class and text color for each status:
                                if ($status == 'pending') {
                                    $badgeClass = 'badge badge-warning';
                                } elseif ($status == 'opened') {
                                    $badgeClass = 'badge badge-success';
                                } elseif ($status == 'closed') {
                                    $badgeClass = 'badge badge-secondary';
                                } else {
                                    $badgeClass = 'badge badge-light';
                                }
                                $ticket['user_name'] = getFullname($ticket['user_id']);
                            ?>
                                <tr data-ticket-id="<?= $ticket['id'] ?>" data-ticket='<?= htmlspecialchars(json_encode($ticket), ENT_QUOTES, "UTF-8") ?>'>
                                    <td><?= $ticket['ticket_id'] ?></td>
                                    <td><a href="./userDetails.php?user_id=<?= $ticket['user_id'] ?>"><?= getFullname($ticket['user_id']) ?></a></td>
                                    <td><?= $ticket['subject'] ?></td>
                                    <td><span class="<?= $badgeClass ?>"><?= ucfirst($status) ?></span></td>
                                    <td><?= $ticket['datetime'] ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-info view-ticket" data-ticket='<?= htmlspecialchars(json_encode($ticket), ENT_QUOTES, "UTF-8") ?>'>View</button>
                                        <button class="btn btn-sm btn-primary edit-ticket" data-ticket='<?= htmlspecialchars(json_encode($ticket), ENT_QUOTES, "UTF-8") ?>'>Edit</button>
                                        <button class="btn btn-sm btn-danger delete-ticket" data-ticket-id="<?= $ticket['id'] ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>

                <!-- View Ticket Modal -->
                <div class="modal fade" id="viewTicketModal" tabindex="-1" role="dialog" aria-labelledby="viewTicketModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 id="viewTicketModalLabel" class="modal-title" style="color: #222;">Ticket Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true" style="color: #222;">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" style="color: #222;">
                                <p><strong>Ticket ID:</strong> <span id="viewTicket_id"></span></p>
                                <p><strong>User:</strong> <span id="viewTicket_user"></span></p>
                                <p><strong>Subject:</strong> <span id="viewTicket_subject"></span></p>
                                <p><strong>Message:</strong> <span id="viewTicket_message"></span></p>
                                <p><strong>Image:</strong> <span id="viewTicket_image"></span></p>
                                <p><strong>Status:</strong> <span id="viewTicket_status"></span></p>
                                <p><strong>Created:</strong> <span id="viewTicket_created"></span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #b58e43; border: none;">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Edit Ticket Modal -->
                <div class="modal fade" id="editTicketModal" tabindex="-1" role="dialog" aria-labelledby="editTicketModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="editTicketForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editTicketModalLabel">Edit Ticket Status</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Hidden field for ticket ID -->
                                    <input type="hidden" name="ticket_id" id="editTicket_id">
                                    <div class="form-group">
                                        <label for="editTicket_status">Status</label>
                                        <select class="form-control" id="editTicket_status" name="status" required>
                                            <option value="pending">Pending</option>
                                            <option value="opened">Open</option>
                                            <option value="closed">Closed</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="background-color: #b58e43; border: none;">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Wallet Management -->
                <section id="wallets">
                    <h2>Wallets</h2>
                    <!-- Button to trigger Create Wallet Modal -->
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createWalletModal">Create New Wallet</button>
                    <table class="table table-striped table-sm dt-responsive">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Limits</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_wallets as $wallet) : ?>
                                <tr data-wallet='<?= htmlspecialchars(json_encode($wallet), ENT_QUOTES, "UTF-8") ?>'>
                                    <td><?= $wallet['wallet_id'] ?></td>
                                    <td><?= $wallet['wallet_name'] ?></td>
                                    <td>$<?= number_format($wallet['wallet_min']) ?> - $<?= number_format($wallet['wallet_max']) ?></td>
                                    <td><?= $wallet['wallet_address'] ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-wallet" data-wallet='<?= htmlspecialchars(json_encode($wallet), ENT_QUOTES, "UTF-8") ?>'>Edit</button>
                                        <button class="btn btn-sm btn-danger delete-wallet" data-wallet-id="<?= $wallet['wallet_id'] ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>

                <!-- Create Wallet Modal -->
                <div class="modal fade" id="createWalletModal" tabindex="-1" role="dialog" aria-labelledby="createWalletModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="createWalletForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createWalletModalLabel">Create New Wallet</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="createWallet_name">Wallet Name</label>
                                        <input type="text" class="form-control" id="createWallet_name" name="wallet_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createWallet_short">Wallet Short</label>
                                        <input type="text" class="form-control" id="createWallet_short" name="wallet_short" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createWallet_min">Wallet Minimum Limit</label>
                                        <input type="text" class="form-control" id="createWallet_min" name="wallet_min" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createWallet_max">Wallet Maximum Limit</label>
                                        <input type="text" class="form-control" id="createWallet_max" name="wallet_max" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createWallet_address">Wallet Address</label>
                                        <input type="text" class="form-control" id="createWallet_address" name="wallet_address" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create Wallet</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit Wallet Modal -->
                <div class="modal fade" id="editWalletModal" tabindex="-1" role="dialog" aria-labelledby="editWalletModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="editWalletForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editWalletModalLabel">Edit Wallet</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Hidden field for wallet ID -->
                                    <input type="hidden" name="wallet_id" id="editWallet_id">
                                    <div class="form-group">
                                        <label for="editWallet_name">Wallet Name</label>
                                        <input type="text" class="form-control" id="editWallet_name" name="wallet_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editWallet_short">Wallet Short</label>
                                        <input type="text" class="form-control" id="editWallet_short" name="wallet_short" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editWallet_min">Wallet Minimum Limit</label>
                                        <input type="text" class="form-control" id="editWallet_min" name="wallet_min" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editWallet_max">Wallet Maximum Limit</label>
                                        <input type="text" class="form-control" id="editWallet_max" name="wallet_max" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editWallet_address">Wallet Address</label>
                                        <input type="text" class="form-control" id="editWallet_address" name="wallet_address" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Plan Management -->
                <section id="plans">
                    <h2>Investment Plans</h2>
                    <!-- Button to trigger Create Plan Modal -->
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createPlanModal">Create New Plan</button>
                    <table class="table table-striped table-sm dt-responsive">
                        <thead>
                            <tr>
                                <th>Plan ID</th>
                                <th>Name</th>
                                <th>Type</th>
                                <th>Rate</th>
                                <th>Duration</th>
                                <th>Limits</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($all_investment_plans as $plan) : ?>
                                <tr data-plan='<?= htmlspecialchars(json_encode($plan), ENT_QUOTES, "UTF-8") ?>'>
                                    <td><?= $plan['plan_id'] ?></td>
                                    <td style="text-transform: capitalize;"><?= $plan['plan_name'] ?> plan</td>
                                    <td><?= $plan['plan_type'] ?></td>
                                    <td><?= $plan['plan_rate'] ?>%</td>
                                    <td><?= $plan['duration_text'] ?></td>
                                    <td>$<?= number_format($plan['plan_min']) ?> - $<?= number_format($plan['plan_max']) ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-primary edit-plan" data-plan='<?= htmlspecialchars(json_encode($plan), ENT_QUOTES, "UTF-8") ?>'>Edit</button>
                                        <button class="btn btn-sm btn-danger delete-plan" data-plan-id="<?= $plan['plan_id'] ?>">Delete</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </section>

                <!-- Create Plan Modal -->
                <div class="modal fade" id="createPlanModal" tabindex="-1" role="dialog" aria-labelledby="createPlanModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="createPlanForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="createPlanModalLabel">Create New Plan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Note: The plan_id is generated in the createPlan.php so it is not a field here -->
                                    <div class="form-group">
                                        <label for="createPlan_name">Plan Name</label>
                                        <input type="text" class="form-control" id="createPlan_name" name="plan_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createPlan_type">Plan Type</label>
                                        <input type="text" class="form-control" id="createPlan_type" name="plan_type" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createPlan_rate">Plan Rate</label>
                                        <input type="text" class="form-control" id="createPlan_rate" name="plan_rate" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createPlan_duration">Duration</label>
                                        <input type="text" class="form-control" id="createPlan_duration" name="duration" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createPlan_duration_text">Duration Text</label>
                                        <input type="text" class="form-control" id="createPlan_duration_text" name="duration_text" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createPlan_min">Minimum Limit</label>
                                        <input type="text" class="form-control" id="createPlan_min" name="plan_min" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="createPlan_max">Maximum Limit</label>
                                        <input type="text" class="form-control" id="createPlan_max" name="plan_max" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Create Plan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit Plan Modal -->
                <div class="modal fade" id="editPlanModal" tabindex="-1" role="dialog" aria-labelledby="editPlanModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <form id="editPlanForm">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editPlanModalLabel">Edit Plan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Hidden field for plan_id -->
                                    <input type="hidden" name="plan_id" id="editPlan_id">
                                    <div class="form-group">
                                        <label for="editPlan_name">Plan Name</label>
                                        <input type="text" class="form-control" id="editPlan_name" name="plan_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editPlan_type">Plan Type</label>
                                        <input type="text" class="form-control" id="editPlan_type" name="plan_type" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editPlan_rate">Plan Rate</label>
                                        <input type="text" class="form-control" id="editPlan_rate" name="plan_rate" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editPlan_duration">Duration</label>
                                        <input type="text" class="form-control" id="editPlan_duration" name="duration" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editPlan_duration_text">Duration Text</label>
                                        <input type="text" class="form-control" id="editPlan_duration_text" name="duration_text" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editPlan_min">Minimum Limit</label>
                                        <input type="text" class="form-control" id="editPlan_min" name="plan_min" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="editPlan_max">Maximum Limit</label>
                                        <input type="text" class="form-control" id="editPlan_max" name="plan_max" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/3.0.4/js/dataTables.responsive.min.js"></script>
    <script src="admin-ajax.js"></script>
</body>

</html>