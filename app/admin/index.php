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
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" href="/crest/assets/images/logoIcon/crest-favicon.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="style.css">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
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
                    <table class="table table-striped table-sm">
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
                                    <td><?= $user['fname'] . " " . $user['lname'] ?></td>
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
                                    <td><?= getFullname($transac['user_id']) ?></td>
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
                    <table class="table table-striped table-sm">
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
                                    <td style="text-transform: capitalize;"><?= $invest['plan_name'] ?></td>
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
                    <table class="table table-striped table-sm">
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
                                    <td><?= $ticket['user_name'] ?></td>
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
                    <table class="table table-striped table-sm">
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
                    <h2>Investement Plans</h2>
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTables on all tables on the page
            $('table').DataTable({
                pageLength: 10,
                // Optional: add more DataTables settings here, e.g., language customization, ordering, etc.
            });

            // --- Toggle Status ---
            $('.toggle-status').click(function() {
                var btn = $(this);
                var userId = btn.data('user-id');
                var currentStatus = btn.data('status');
                // Decide new status based on the current one
                var newStatus = (currentStatus === 'active') ? 'blocked' : 'active';

                $.post('../backend/adminActions/updateUser.php', {
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

            // --- Open View User Modal and Fill Data ---
            $('.view-user').click(function() {
                var userData = $(this).data('user');
                // Fill modal fields using userData
                $('#view_user_id').text(userData.id);
                $('#view_fname').text(userData.fname);
                $('#view_lname').text(userData.lname);
                $('#view_email').text(userData.email);
                $('#view_phone').text(userData.phone);
                $('#view_country').text(userData.country);
                $('#view_address').text(userData.address);
                $('#view_zip').text(userData.zip);
                $('#view_city').text(userData.city);
                $('#view_state').text(userData.state);
                $('#view_pic').text(userData.pic);
                // Show modal
                $('#viewUserModal').modal('show');
            });

            // --- Submit Edit Form with AJAX ---
            $('#editUserForm').submit(function(e) {
                e.preventDefault();
                $.post('../backend/adminActions/updateUser.php', $(this).serialize() + '&action=updateInfo', function(response) {
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
                    $.post('../backend/adminActions/deleteUser.php', {
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
            $(document).on('click', '.view-transac', function() {
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
            $(document).on('click', '.edit-transac', function() {
                var transac = $(this).data('transac');
                $('#edit_trans_id').val(transac.id);
                $('#edit_trans_type').val(transac.transaction_type);
                $('#edit_transac_id').val(transac.transac_id);
                $('#edit_amount').val(transac.amount);
                $('#edit_currency_span').text(`(${transac.currency})`);
                $('#edit_dol_val').val(transac.dol_val);
                $('#edit_address').val(transac.address);
                $('#edit_status').val(transac.status.toLowerCase());
                $('#editTransacModal').modal('show');
            });

            // --- Submit Edit Transaction Form via AJAX ---
            $('#editTransacForm').submit(function(e) {
                e.preventDefault();
                $.post('../backend/adminActions/updateTransac.php', $(this).serialize(), function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }, 'json');
            });

            // --- Delete Transaction with confirmation ---
            $(document).on('click', '.delete-transac', function() {
                var trans_id = $(this).data('transac-id');
                var trans_type = $(this).data('trans-type');
                if (confirm("Are you sure you want to delete this transaction?")) {
                    $.post('../backend/adminActions/deleteTransac.php', {
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

            // Filter transactions by type
            $('#filterTransacType').change(function() {
                var selectedType = $(this).val();
                // Loop through each row in the transactions table
                $('#transactions tbody tr').each(function() {
                    var rowType = $(this).data('trans-type'); // Should be 'deposit' or 'withdrawal'
                    if (selectedType === 'all' || selectedType === rowType) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });

            // --- Open View Investment Modal and populate fields ---
            $(document).on('click', '.view-invest', function() {
                var invest = $(this).data('invest');
                $('#viewInvest_id').text(invest.invest_id);
                $('#viewInvest_plan').text(`${invest.plan_name} plan`);
                $('#viewInvest_user').text(invest.user);
                $('#viewInvest_amount').text(parseFloat(invest.amount).toFixed(2));
                $('#viewInvest_earned').text(parseFloat(invest.earned).toFixed(2));
                $('#viewInvest_expected').text(parseFloat(invest.expected).toFixed(2));
                $('#viewInvest_duration').text(invest.num_of_days);
                $('#viewInvest_start_date').text(invest.start_date);
                $('#viewInvest_end_date').text(invest.end_date);
                $('#viewInvest_status').text(invest.status);
                $('#viewInvestModal').modal('show');
            });

            // --- Open Edit Investment Modal and populate fields ---
            $(document).on('click', '.edit-invest', function() {
                var invest = $(this).data('invest');
                $('#editInvest_id').val(invest.invest_id);
                $('#editInvest_amount').val(invest.amount);
                $('#editInvest_earned').val(invest.earned);
                $('#editInvest_expected').val(invest.expected);
                $('#editInvest_status').val(invest.status.toLowerCase());
                $('#editInvest_num_of_days').val(invest.num_of_days);
                $('#editInvestModal').modal('show');
            });

            // --- Submit Edit Investment Form via AJAX ---
            $('#editInvestForm').submit(function(e) {
                e.preventDefault();
                $.post('../backend/adminActions/updateInvest.php', $(this).serialize(), function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }, 'json');
            });

            // --- Delete Investment with Confirmation ---
            $(document).on('click', '.delete-invest', function() {
                var invest_id = $(this).data('invest-id');
                if (confirm("Are you sure you want to delete this investment?")) {
                    $.post('../backend/adminActions/deleteInvest.php', {
                        invest_id: invest_id
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

            // --- Open View Ticket Modal and populate fields ---
            $(document).on('click', '.view-ticket', function() {
                var ticket = $(this).data('ticket');
                $('#viewTicket_id').text(ticket.id);
                $('#viewTicket_user').text(ticket.user_name);
                $('#viewTicket_subject').text(ticket.subject);
                $('#viewTicket_message').text(ticket.message);
                if (ticket.image) {
                    // Display image if available, adjust size as needed
                    $('#viewTicket_image').html('<img src="' + ticket.image + '" alt="Ticket Image" style="max-width:100%;">');
                } else {
                    $('#viewTicket_image').text('No image');
                }
                // Set status with proper casing
                $('#viewTicket_status').html(ticket.status ? ticket.status.charAt(0).toUpperCase() + ticket.status.slice(1) : '');
                $('#viewTicket_created').text(ticket.created);
                $('#viewTicketModal').modal('show');
            });

            // --- Open Edit Ticket Modal and populate fields ---
            $(document).on('click', '.edit-ticket', function() {
                var ticket = $(this).data('ticket');
                $('#editTicket_id').val(ticket.id);
                $('#editTicket_status').val(ticket.status.toLowerCase());
                $('#editTicketModal').modal('show');
            });

            // --- Submit Edit Ticket Form via AJAX ---
            $('#editTicketForm').submit(function(e) {
                e.preventDefault();
                $.post('../backend/adminActions/updateTicket.php', $(this).serialize(), function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }, 'json');
            });

            // --- Delete Ticket with confirmation ---
            $(document).on('click', '.delete-ticket', function() {
                var ticket_id = $(this).data('ticket-id');
                if (confirm("Are you sure you want to delete this ticket?")) {
                    $.post('../backend/adminActions/deleteTicket.php', {
                        ticket_id: ticket_id
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

            // Create Wallet AJAX
            $(document).on('submit', '#createWalletForm', function(e) {
                e.preventDefault();
                $.post('../backend/adminActions/createWallet.php', $(this).serialize(), function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }, 'json');
            });

            // Open Edit Wallet Modal and populate fields
            $(document).on('click', '.edit-wallet', function() {
                var wallet = $(this).data('wallet');
                $('#editWallet_id').val(wallet.wallet_id);
                $('#editWallet_name').val(wallet.wallet_name);
                $('#editWallet_short').val(wallet.wallet_short);
                $('#editWallet_min').val(wallet.wallet_min);
                $('#editWallet_max').val(wallet.wallet_max);
                $('#editWallet_address').val(wallet.wallet_address);
                $('#editWalletModal').modal('show');
            });

            // Edit Wallet AJAX
            $(document).on('submit', '#editWalletForm', function(e) {
                e.preventDefault();
                $.post('../backend/adminActions/updateWallet.php', $(this).serialize(), function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        location.reload();
                    } else {
                        alert(response.message);
                    }
                }, 'json');
            });

            // Delete Wallet AJAX
            $(document).on('click', '.delete-wallet', function() {
                var wallet_id = $(this).data('wallet-id');
                if (confirm("Are you sure you want to delete this wallet?")) {
                    $.post('../backend/adminActions/deleteWallet.php', {
                        wallet_id: wallet_id
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