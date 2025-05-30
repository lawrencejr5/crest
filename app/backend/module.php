<?php

require_once __DIR__ . '/../../vendor/autoload.php'; // adjust path if necessary
use OTPHP\TOTP;

include 'conn.php';

class Modules extends Connection
{
    private $sql;
    private $stmt;

    // Function to get user data based on user_id
    public function getUserData($uid)
    {
        $this->sql = "SELECT * FROM users WHERE id = :id OR user_id = :user_id LIMIT 1";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':id', $uid);
        $this->stmt->bindParam(':user_id', $uid);
        if ($this->stmt->execute()) {
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    public function checkEmailExists($email)
    {
        $this->sql = "SELECT email FROM users WHERE email = :email";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }

    public function checkVerifyCode($code, $email)
    {
        $this->sql = "SELECT otp FROM users WHERE otp = :otp AND email = :email";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->bindParam(':otp', $code);
        $this->stmt->execute();
        $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        return $this->stmt->rowCount();
    }

    public function verifyEmail($email)
    {
        $this->sql = "UPDATE users SET verified = '1' WHERE email = :email";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':email', $email);
            $this->stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function updateVerifyCode($code, $email)
    {
        $this->sql = "UPDATE users SET otp = :otp WHERE email = :email";
        try {
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':email', $email);
            $this->stmt->bindParam(':otp', $code);
            $this->stmt->execute();
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

    // New function to get a user by email
    public function getUserByEmail($email)
    {
        $this->sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':email', $email);
        if ($this->stmt->execute()) {
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Function to verify if the email already exists
    public function emailExists($email)
    {
        $sql = "SELECT COUNT(*) FROM users WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        // Return true if count is greater than 0
        return $stmt->fetchColumn() > 0;
    }

    public function register($user_id, $fname, $lname, $email, $password, $phone, $country, $otp, $ref = null)
    {
        // Check if the email already exists before registering
        if ($this->emailExists($email)) {
            return "email_exists";
        }

        $this->sql = "INSERT INTO users (user_id, fname, lname, email, password, phone, country, otp, ref) VALUES (:user_id, :fname, :lname, :email, :password, :phone, :country, :otp, :ref)";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        $this->stmt->bindParam(':fname', $fname);
        $this->stmt->bindParam(':lname', $lname);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->bindParam(':password', $password);
        $this->stmt->bindParam(':phone', $phone);
        $this->stmt->bindParam(':country', $country);
        $this->stmt->bindParam(':otp', $otp);
        $this->stmt->bindParam(':ref', $ref);
        if ($this->stmt->execute()) {
            return "success";
        } else {
            return false;
        }
    }

    // New function for user login that checks if the user is verified
    public function login($email, $password)
    {
        // Fetch user based on email and password without checking the verified status in the query
        $this->sql = "SELECT * FROM users WHERE email = :email AND password = :password LIMIT 1";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->bindParam(':password', $password);

        if ($this->stmt->execute()) {
            $user = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        }
        return false;
    }

    // Update user data with all fields from register (minus otp, ref, and password) plus address, zip, city, state, and pic
    public function updateUserData($user_id, $fname, $lname, $email, $phone, $country, $address, $zip, $city, $state, $pic)
    {
        $this->sql = "UPDATE users 
                      SET fname = :fname, 
                          lname = :lname, 
                          email = :email, 
                          phone = :phone, 
                          country = :country, 
                          address = :address, 
                          zip = :zip, 
                          city = :city, 
                          state = :state, 
                          pic = :pic
                      WHERE id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':fname', $fname);
        $this->stmt->bindParam(':lname', $lname);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->bindParam(':phone', $phone);
        $this->stmt->bindParam(':country', $country);
        $this->stmt->bindParam(':address', $address);
        $this->stmt->bindParam(':zip', $zip);
        $this->stmt->bindParam(':city', $city);
        $this->stmt->bindParam(':state', $state);
        $this->stmt->bindParam(':pic', $pic);
        $this->stmt->bindParam(':user_id', $user_id);
        return $this->stmt->execute();
    }

    // Update password for a user
    public function updatePassword($user_id, $new_password)
    {
        // Hash the new password using BCRYPT
        $hashed_password = password_hash($new_password, PASSWORD_BCRYPT);
        $this->sql = "UPDATE users SET password = :password WHERE id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':password', $hashed_password);
        $this->stmt->bindParam(':user_id', $user_id);
        return $this->stmt->execute();
    }

    // Make deposit with transaction ID
    public function makeDeposit($user_id, $transac_id, $amount, $dol_val, $currency, $type, $address, $status = 'pending')
    {
        $this->sql = "INSERT INTO deposits (user_id, transac_id, amount, dol_val, currency, type, address, status) VALUES (:user_id, :transac_id, :amount, :dol_val, :currency, :type, :address, :status)";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        $this->stmt->bindParam(':transac_id', $transac_id);
        $this->stmt->bindParam(':amount', $amount);
        $this->stmt->bindParam(':dol_val', $dol_val);
        $this->stmt->bindParam(':currency', $currency);
        $this->stmt->bindParam(':type', $type);
        $this->stmt->bindParam(':address', $address);
        $this->stmt->bindParam(':status', $status);
        if ($this->stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function uploadProof($transac_id, $proof)
    {
        $this->sql = "UPDATE deposits 
                      SET proof = :proof
                      WHERE transac_id = :transac_id";
        $this->stmt = $this->conn->prepare($this->sql);

        $this->stmt->bindParam(':proof', $proof);
        $this->stmt->bindParam(':transac_id', $transac_id);
        return $this->stmt->execute();
    }

    // Get user deposits
    public function getUserDeposits($user_id)
    {
        $this->sql = "SELECT * FROM deposits WHERE user_id = :user_id ORDER BY id DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Get referral bonus deposits for a user from deposits table
    public function getRefBonusDeposits($user_id)
    {
        $this->sql = "SELECT * FROM deposits WHERE user_id = :user_id AND type = 'ref bonus' ORDER BY datetime DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Get total deposits for a user
    public function getTotalDeposits($user_id)
    {
        $this->sql = "SELECT SUM(dol_val) as total FROM deposits WHERE user_id = :user_id AND status = 'success'";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ? $result['total'] : 0;
        }
        return 0;
    }

    // Make Withdrawal with transaction ID
    public function makeWithdrawal($user_id, $transac_id, $amount, $dol_val, $currency, $address, $type, $status = 'pending')
    {
        $this->sql = "INSERT INTO withdrawals (user_id, transac_id, amount, dol_val, currency, address, type, status) VALUES (:user_id, :transac_id, :amount, :dol_val, :currency, :address, :type, :status)";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        $this->stmt->bindParam(':transac_id', $transac_id);
        $this->stmt->bindParam(':amount', $amount);
        $this->stmt->bindParam(':dol_val', $dol_val);
        $this->stmt->bindParam(':currency', $currency);
        $this->stmt->bindParam(':address', $address);
        $this->stmt->bindParam(':type', $type);
        $this->stmt->bindParam(':status', $status);
        if ($this->stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    // Get user withdrawals
    public function getUserWithdrawals($user_id)
    {
        $this->sql = "SELECT * FROM withdrawals WHERE user_id = :user_id ORDER BY id DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Get total withdrawals for a user
    public function getTotalWithdrawals($user_id)
    {
        $this->sql = "SELECT SUM(dol_val) as total FROM withdrawals WHERE user_id = :user_id AND status = 'success'";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ? $result['total'] : 0;
        }
        return 0;
    }

    // Get available deposit balance for a user (total deposits minus total withdrawals)
    public function getAvailableDepositBalance($user_id)
    {
        $totalDeposits = $this->getTotalDeposits($user_id);
        $totalWithdrawals = $this->getTotalWithdrawals($user_id);
        return $totalDeposits - $totalWithdrawals;
    }

    // Create new ticket
    public function createTicket($user_id, $ticket_id, $fullname, $email, $subject, $file, $status, $message)
    {
        $this->sql = "INSERT INTO tickets (user_id, ticket_id, fullname, email, subject, file, status, message) 
                      VALUES (:user_id, :ticket_id, :fullname, :email, :subject, :file, :status, :message)";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        $this->stmt->bindParam(':ticket_id', $ticket_id);
        $this->stmt->bindParam(':fullname', $fullname);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->bindParam(':subject', $subject);
        $this->stmt->bindParam(':file', $file);
        $this->stmt->bindParam(':status', $status);
        $this->stmt->bindParam(':message', $message);
        return $this->stmt->execute();
    }

    // Get all tickets for a user
    public function getAllUserTickets($user_id)
    {
        $this->sql = "SELECT * FROM tickets WHERE user_id = :user_id ORDER BY id DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Get all tickets for a specific user
    public function getUserTickets($user_id)
    {
        $this->sql = "SELECT * FROM tickets WHERE user_id = :user_id ORDER BY datetime DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Get all users referred by a given user
    public function getUserReferrals($user_id)
    {
        $this->sql = "SELECT * FROM users WHERE ref = :ref ORDER BY id DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':ref', $user_id);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Get all wallets
    public function getAllWallets()
    {
        $this->sql = "SELECT * FROM wallets";
        $this->stmt = $this->conn->prepare($this->sql);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Update a wallet (admin function)
    public function updateWallet($wallet_id, $wallet_name, $wallet_short, $wallet_min, $wallet_max, $wallet_address)
    {
        $this->sql = "UPDATE wallets 
                      SET wallet_name = :wallet_name, 
                          wallet_short = :wallet_short, 
                          wallet_min = :wallet_min, 
                          wallet_max = :wallet_max, 
                          wallet_address = :wallet_address 
                      WHERE wallet_id = :wallet_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':wallet_name', $wallet_name);
        $this->stmt->bindParam(':wallet_short', $wallet_short);
        $this->stmt->bindParam(':wallet_min', $wallet_min);
        $this->stmt->bindParam(':wallet_max', $wallet_max);
        $this->stmt->bindParam(':wallet_address', $wallet_address);
        $this->stmt->bindParam(':wallet_id', $wallet_id);
        return $this->stmt->execute();
    }

    // Delete a wallet (admin function)
    public function deleteWallet($wallet_id)
    {
        $this->sql = "DELETE FROM wallets WHERE wallet_id = :wallet_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':wallet_id', $wallet_id);
        return $this->stmt->execute();
    }

    // Get all investment plans
    public function getAllPlans()
    {
        $this->sql = "SELECT * FROM plans";
        $this->stmt = $this->conn->prepare($this->sql);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Get a single plan by plan_id
    public function getPlan($plan_id)
    {
        $this->sql = "SELECT * FROM plans WHERE plan_id = :plan_id LIMIT 1";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':plan_id', $plan_id);
        if ($this->stmt->execute()) {
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Update an investment plan (admin function)
    // $fields is an associative array of columns to update, e.g. ['plan_name' => 'New Name', 'plan_rate' => 5]
    public function updatePlan($plan_id, $fields)
    {
        $set_fields = [];
        foreach ($fields as $column => $value) {
            $set_fields[] = "$column = :$column";
        }
        $set_str = implode(", ", $set_fields);
        $this->sql = "UPDATE plans SET $set_str WHERE plan_id = :plan_id";
        $this->stmt = $this->conn->prepare($this->sql);
        foreach ($fields as $column => $value) {
            $this->stmt->bindValue(":$column", $value);
        }
        $this->stmt->bindParam(':plan_id', $plan_id);
        return $this->stmt->execute();
    }

    // Delete an investment plan (admin function)
    public function deletePlan($plan_id)
    {
        $this->sql = "DELETE FROM plans WHERE plan_id = :plan_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':plan_id', $plan_id);
        return $this->stmt->execute();
    }

    // Start an investment
    public function startInvestment($invest_id, $user_id, $plan_id, $amount, $start_date, $end_date, $to_earn, $earned, $expected, $num_of_days, $status)
    {
        $this->sql = "INSERT INTO investments (invest_id, user_id, plan_id, amount, start_date, end_date, to_earn, earned, expected, num_of_days, status) 
                      VALUES (:invest_id, :user_id, :plan_id, :amount, :start_date, :end_date, :to_earn, :earned, :expected, :num_of_days, :status)";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':invest_id', $invest_id);
        $this->stmt->bindParam(':user_id', $user_id);
        $this->stmt->bindParam(':plan_id', $plan_id);
        $this->stmt->bindParam(':amount', $amount);
        $this->stmt->bindParam(':start_date', $start_date);
        $this->stmt->bindParam(':end_date', $end_date);
        $this->stmt->bindParam(':to_earn', $to_earn);
        $this->stmt->bindParam(':earned', $earned);
        $this->stmt->bindParam(':expected', $expected);
        $this->stmt->bindParam(':num_of_days', $num_of_days);
        $this->stmt->bindParam(':status', $status);
        return $this->stmt->execute();
    }

    // Get total investments for a user
    public function getTotalInvestments($user_id)
    {
        $this->sql = "SELECT SUM(amount) as total FROM investments WHERE user_id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ? $result['total'] : 0;
        }
        return 0;
    }

    // Get total interest wallet
    public function getTotalInterestWallet($user_id)
    {
        $this->sql = "SELECT SUM(interest_wallet) as total FROM investments WHERE user_id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ? $result['total'] : 0;
        }
        return 0;
    }

    public function getTotalInterestReadings($user_id)
    {
        $this->sql = "SELECT SUM(earned) as total FROM investments WHERE user_id = :user_id AND status = 'active'";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ? $result['total'] : 0;
        }
        return 0;
    }

    public function resetInterestWallet($invest_id)
    {
        $this->sql = "UPDATE investments SET interest_wallet = 0 WHERE invest_id = :invest_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(":invest_id", $invest_id);
        $this->stmt->execute();
    }

    // Get total investments for a user
    public function getTotalInterests($user_id)
    {
        $this->sql = "SELECT SUM(earned) as total FROM investments WHERE user_id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            $result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $result['total'] ? $result['total'] : 0;
        }
        return 0;
    }

    // Get all investments for a user
    public function getAllUserInvestments($user_id)
    {
        $this->sql = "SELECT * FROM investments WHERE user_id = :user_id ORDER BY start_date DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Update investment profit
    public function updateInvestmentProfit($invest_id, $newEarned, $newNumOfDays, $newStatus, $lastUpdated, $interest_wallet = 0)
    {
        $this->sql = "UPDATE investments 
                      SET earned = :earned, 
                          num_of_days = :num_of_days, 
                          status = :status,
                          last_updated = :last_updated,
                          interest_wallet = :interest_wallet
                      WHERE invest_id = :invest_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':earned', $newEarned);
        $this->stmt->bindParam(':num_of_days', $newNumOfDays);
        $this->stmt->bindParam(':status', $newStatus);
        $this->stmt->bindParam(':last_updated', $lastUpdated);
        $this->stmt->bindParam(':interest_wallet', $interest_wallet);
        $this->stmt->bindParam(':invest_id', $invest_id);
        return $this->stmt->execute();
    }

    // Generate and save a new 2FA secret for a user
    public function generate2FASecret($user_id)
    {
        $totp = TOTP::create();  // You may customize period, digits, etc.
        $secret = $totp->getSecret();

        // Save the secret and set two_factor_enabled to false (0)
        $this->sql = "UPDATE users SET two_factor_secret = :secret, two_factor_enabled = 1 WHERE id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':secret', $secret);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            return $secret;
        }
        return false;
    }

    // Verify a submitted TOTP code for a user
    public function verify2FACode($user_id, $code)
    {
        $this->sql = "SELECT two_factor_secret FROM users WHERE id = :user_id LIMIT 1";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
            if ($row && !empty($row['two_factor_secret'])) {
                $secret = $row['two_factor_secret'];
                $totp = TOTP::create($secret);
                return $totp->verify($code);
            }
        }
        return false;
    }

    // Enable 2FA for a user (if the code is valid)
    public function enable2FA($user_id, $code)
    {
        if ($this->verify2FACode($user_id, $code)) {
            $this->sql = "UPDATE users SET two_factor_enabled = '1' WHERE id = :user_id";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':user_id', $user_id);
            return $this->stmt->execute();
        }
        return false;
    }

    // Disable 2FA for a user (if the code is valid)
    public function disable2FA($user_id, $code)
    {
        if ($this->verify2FACode($user_id, $code)) {
            $this->sql = "UPDATE users SET two_factor_enabled = '0' WHERE id = :user_id";
            $this->stmt = $this->conn->prepare($this->sql);
            $this->stmt->bindParam(':user_id', $user_id);
            return $this->stmt->execute();
        }
        return false;
    }

    // ************** ADMIN SECTION ************** //

    // Get rowcount data
    public function getRowCount($table, $condition = '')
    {
        $where = $condition ? " WHERE $condition" : "";
        $this->sql = "SELECT COUNT(*) AS count FROM $table" . $where;
        $this->stmt = $this->conn->prepare($this->sql);
        if ($this->stmt->execute()) {
            $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return isset($row['count']) ? $row['count'] : 0;
        }
        return 0;
    }

    // Get total sum of a column in a table
    public function getTotal($table, $column, $condition = '')
    {
        $where = $condition ? " WHERE $condition" : "";
        $this->sql = "SELECT SUM($column) as total FROM $table" . $where;
        $this->stmt = $this->conn->prepare($this->sql);
        if ($this->stmt->execute()) {
            $row = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $row['total'] ? $row['total'] : 0;
        }
        return 0;
    }

    // Create Investemnt Plan
    public function createPlan($plan_id, $plan_name, $plan_type, $plan_rate, $duration, $duration_text, $plan_min, $plan_max)
    {
        $this->sql = "INSERT INTO plans (plan_id, plan_name, plan_type, plan_rate, duration, duration_text, plan_min, plan_max) VALUES (:plan_id, :plan_name, :plan_type, :plan_rate, :duration, :duration_text, :plan_min, :plan_max)";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':plan_id', $plan_id);
        $this->stmt->bindParam(':plan_name', $plan_name);
        $this->stmt->bindParam(':plan_type', $plan_type);
        $this->stmt->bindParam(':plan_rate', $plan_rate);
        $this->stmt->bindParam(':duration', $duration);
        $this->stmt->bindParam(':duration_text', $duration_text);
        $this->stmt->bindParam(':plan_min', $plan_min);
        $this->stmt->bindParam(':plan_max', $plan_max);
        return $this->stmt->execute();
    }

    // Create Wallet
    public function createWallet($wallet_id, $wallet_name, $wallet_short, $wallet_min, $wallet_max, $wallet_address)
    {
        $this->sql = "INSERT INTO wallets (wallet_id, wallet_name, wallet_short, wallet_min, wallet_max, wallet_address) VALUES (:wallet_id, :wallet_name, :wallet_short, :wallet_min, :wallet_max, :wallet_address)";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':wallet_id', $wallet_id);
        $this->stmt->bindParam(':wallet_name', $wallet_name);
        $this->stmt->bindParam(':wallet_short', $wallet_short);
        $this->stmt->bindParam(':wallet_min', $wallet_min);
        $this->stmt->bindParam(':wallet_max', $wallet_max);
        $this->stmt->bindParam(':wallet_address', $wallet_address);
        return $this->stmt->execute();
    }

    // ************** ADMIN USER FUNCTIONS ************** //

    // Update a user's status (e.g. active, blocked)
    public function updateUserStatus($user_id, $status)
    {
        $this->sql = "UPDATE users SET status = :status WHERE id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':status', $status);
        $this->stmt->bindParam(':user_id', $user_id);
        return $this->stmt->execute();
    }

    // Update user information (this function can be used for editing all fields)
    public function updateUserInfo($user_id, $fname, $lname, $email, $phone, $country, $address, $zip, $city, $state, $pic)
    {
        $this->sql = "UPDATE users 
                      SET fname = :fname, 
                          lname = :lname, 
                          email = :email, 
                          phone = :phone, 
                          country = :country, 
                          address = :address, 
                          zip = :zip, 
                          city = :city, 
                          state = :state, 
                          pic = :pic
                      WHERE id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':fname', $fname);
        $this->stmt->bindParam(':lname', $lname);
        $this->stmt->bindParam(':email', $email);
        $this->stmt->bindParam(':phone', $phone);
        $this->stmt->bindParam(':country', $country);
        $this->stmt->bindParam(':address', $address);
        $this->stmt->bindParam(':zip', $zip);
        $this->stmt->bindParam(':city', $city);
        $this->stmt->bindParam(':state', $state);
        $this->stmt->bindParam(':pic', $pic);
        $this->stmt->bindParam(':user_id', $user_id);
        return $this->stmt->execute();
    }

    // Delete a user from the system
    public function deleteUser($user_id)
    {
        $this->sql = "DELETE FROM users WHERE id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        return $this->stmt->execute();
    }

    // Retrieve all user data
    public function getAllUsers()
    {
        $this->sql = "SELECT * FROM users ORDER BY id DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Retrieve all transactions (both deposits and withdrawals) for admin view
    public function getAllTransactions()
    {
        $this->sql = "SELECT 'deposit' as transaction_type, id, user_id, transac_id, amount, dol_val, currency, address, type, proof, status, datetime 
                      FROM deposits 
                      UNION ALL 
                      SELECT 'withdrawal' as transaction_type, id, user_id, transac_id, amount, dol_val, currency, address, type, proof, status, datetime 
                      FROM withdrawals 
                      ORDER BY datetime DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Get all transactions (both deposits and withdrawals) for a user
    public function getAllUserTransactions($user_id)
    {
        $this->sql = "SELECT 'deposit' as transaction_type, id, user_id, transac_id, amount, dol_val, currency, address, type, status, datetime 
                      FROM deposits WHERE user_id = :user_id
                      UNION ALL 
                      SELECT 'withdrawal' as transaction_type, id, user_id, transac_id, amount, dol_val, currency, address, type, status, datetime 
                      FROM withdrawals WHERE user_id = :user_id
                      ORDER BY datetime DESC";

        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Update a transaction based on its type (deposit or withdrawal)
    // $fields is an associative array of columns to update, e.g. ['status' => 'completed']
    public function updateTransaction($trans_type, $trans_id, $fields)
    {
        $table = ($trans_type === 'deposit') ? 'deposits' : 'withdrawals';
        $set_fields = [];
        foreach ($fields as $column => $value) {
            $set_fields[] = "$column = :$column";
        }
        $set_str = implode(", ", $set_fields);
        $this->sql = "UPDATE $table SET $set_str WHERE id = :trans_id";
        $this->stmt = $this->conn->prepare($this->sql);
        foreach ($fields as $column => $value) {
            $this->stmt->bindValue(":$column", $value);
        }
        $this->stmt->bindParam(':trans_id', $trans_id);
        return $this->stmt->execute();
    }

    // Delete a transaction based on its type (deposit or withdrawal)
    public function deleteTransaction($trans_type, $trans_id)
    {
        $table = ($trans_type === 'deposit') ? 'deposits' : 'withdrawals';
        $this->sql = "DELETE FROM $table WHERE id = :trans_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':trans_id', $trans_id);
        return $this->stmt->execute();
    }

    // ************** ADMIN INVESTMENTS FUNCTIONS ************** //

    // Retrieve all investments (admin view)
    public function getAllInvestments()
    {
        $this->sql = "SELECT * FROM investments ORDER BY start_date DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Update an investment (admin function)
    // $fields is an associative array of columns to update, e.g. ['status' => 'active']
    public function updateInvestment($invest_id, $fields)
    {
        $set_fields = [];
        foreach ($fields as $column => $value) {
            $set_fields[] = "$column = :$column";
        }
        $set_str = implode(", ", $set_fields);
        $this->sql = "UPDATE investments SET $set_str WHERE invest_id = :invest_id";
        $this->stmt = $this->conn->prepare($this->sql);
        foreach ($fields as $column => $value) {
            $this->stmt->bindValue(":$column", $value);
        }
        $this->stmt->bindParam(':invest_id', $invest_id);
        return $this->stmt->execute();
    }

    // Delete an investment (admin function)
    public function deleteInvestment($invest_id)
    {
        $this->sql = "DELETE FROM investments WHERE invest_id = :invest_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':invest_id', $invest_id);
        return $this->stmt->execute();
    }

    // ************** ADMIN SUPPORT TICKET FUNCTIONS ************** //

    // Retrieve all tickets (admin view)
    public function getAllTickets()
    {
        $this->sql = "SELECT * FROM tickets ORDER BY datetime DESC";
        $this->stmt = $this->conn->prepare($this->sql);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Update a ticket (admin function)
    // $fields is an associative array of columns to update, e.g. ['status' => 'closed']
    public function updateTicket($ticket_id, $fields)
    {
        $set_fields = [];
        foreach ($fields as $column => $value) {
            $set_fields[] = "$column = :$column";
        }
        $set_str = implode(", ", $set_fields);
        $this->sql = "UPDATE tickets SET $set_str WHERE id = :ticket_id";
        $this->stmt = $this->conn->prepare($this->sql);
        foreach ($fields as $column => $value) {
            $this->stmt->bindValue(":$column", $value);
        }
        $this->stmt->bindParam(':ticket_id', $ticket_id);
        return $this->stmt->execute();
    }

    // Delete a ticket (admin function)
    public function deleteTicket($ticket_id)
    {
        $this->sql = "DELETE FROM tickets WHERE id = :ticket_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':ticket_id', $ticket_id);
        return $this->stmt->execute();
    }


    // Set reset token and expiry (for reset_request)
    public function setPasswordResetToken($user_id, $token, $expires)
    {
        $this->sql = "UPDATE users SET reset_token = :token, reset_expires = :expires WHERE id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':token', $token);
        $this->stmt->bindParam(':expires', $expires);
        $this->stmt->bindParam(':user_id', $user_id);
        return $this->stmt->execute();
    }

    // Get user by reset token (for reset_password)
    public function getUserByResetToken($token)
    {
        $this->sql = "SELECT * FROM users WHERE reset_token = :token LIMIT 1";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':token', $token);
        if ($this->stmt->execute()) {
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
    }

    // Clear reset token (optional)
    public function clearResetToken($user_id)
    {
        $this->sql = "UPDATE users SET reset_token = NULL, reset_expires = NULL WHERE id = :user_id";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        return $this->stmt->execute();
    }
}

// Initializing class
$modules = new Modules();
