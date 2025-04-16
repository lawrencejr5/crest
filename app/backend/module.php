<?php

include 'conn.php';
class Modules extends Connection
{
    private $sql;
    private $stmt;

    // Function to get user data based on user_id
    public function getUserData($uid)
    {
        $this->sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':id', $uid);
        if ($this->stmt->execute()) {
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        return false;
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
            if ($user) {
                // Check if the user is verified
                if ($user['verified'] === "1") {
                    return $user;
                } else {
                    return "not_verified";
                }
            }
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

    // Get total deposits for a user
    public function getTotalDeposits($user_id)
    {
        $this->sql = "SELECT SUM(dol_val) as total FROM deposits WHERE user_id = :user_id";
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
        $this->sql = "SELECT SUM(dol_val) as total FROM withdrawals WHERE user_id = :user_id";
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

    // Get all transactions (both deposits and withdrawals) for a user
    public function getAllTransactions($user_id)
    {
        $this->sql = "SELECT * FROM (
            SELECT id, transac_id, amount, dol_val, currency, address, type, status, datetime
            FROM deposits WHERE user_id = :user_id
            UNION ALL
            SELECT id, transac_id, amount, dol_val, currency, address, type, status, datetime 
            FROM withdrawals WHERE user_id = :user_id
        ) AS transactions
        ORDER BY datetime DESC";

        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
        if ($this->stmt->execute()) {
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        return false;
    }
}


// Initializing class
$modules = new Modules();
