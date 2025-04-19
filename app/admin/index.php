<!-- filepath: c:\xampp\htdocs\crest\app\admin\index.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <style>
        /* Custom styles for admin page */
        .sidebar {
            background: #f8f9fa;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 1rem;
        }

        .sidebar .nav-link {
            color: #333;
        }

        .sidebar .nav-link.active {
            background: #007bff;
            color: #fff;
        }

        main {
            margin-left: 220px;
            padding: 20px;
        }

        section {
            margin-bottom: 40px;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                    <h5 class="text-center mb-4">Admin Panel</h5>
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#dashboard">Dashboard</a>
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
                                    <p class="card-text">1,234</p>
                                </div>
                            </div>
                        </div>
                        <!-- Total Deposits Card -->
                        <div class="col-md-3">
                            <div class="card text-white bg-success mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Deposits</h5>
                                    <p class="card-text">$56,789</p>
                                </div>
                            </div>
                        </div>
                        <!-- Total Withdrawals Card -->
                        <div class="col-md-3">
                            <div class="card text-white bg-danger mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Total Withdrawals</h5>
                                    <p class="card-text">$12,345</p>
                                </div>
                            </div>
                        </div>
                        <!-- Active Investments Card -->
                        <div class="col-md-3">
                            <div class="card text-white bg-info mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Active Investments</h5>
                                    <p class="card-text">67</p>
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
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example placeholder user rows -->
                            <tr>
                                <td>1</td>
                                <td>John Doe</td>
                                <td>john@example.com</td>
                                <td>None</td>
                                <td><button class="btn btn-sm btn-primary">View/Edit</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Jane Smith</td>
                                <td>jane@example.com</td>
                                <td>John Doe</td>
                                <td><button class="btn btn-sm btn-primary">View/Edit</button></td>
                            </tr>
                        </tbody>
                    </table>
                </section>

                <!-- Transactions Management -->
                <section id="transactions">
                    <h2>Transactions</h2>
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Transaction ID</th>
                                <th>Type</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Placeholder transactions -->
                            <tr>
                                <td>2025-01-01</td>
                                <td>TX123456</td>
                                <td>Deposit</td>
                                <td>$100.00</td>
                                <td>Completed</td>
                            </tr>
                            <tr>
                                <td>2025-01-02</td>
                                <td>TX123457</td>
                                <td>Withdrawal</td>
                                <td>$50.00</td>
                                <td>Pending</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

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
</body>

</html>