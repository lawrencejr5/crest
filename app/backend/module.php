<?php
// ini_set('display_errors', 0);
// error_reporting(0);

include 'conn.php';
class Modules extends Connection
{
    private $sql;
    private $stmt;

    // Function to get user data based on user_id
    public function getUserData($user_id)
    {
        $this->sql = "SELECT * FROM users WHERE user_id = :user_id LIMIT 1";
        $this->stmt = $this->conn->prepare($this->sql);
        $this->stmt->bindParam(':user_id', $user_id);
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
}

// Initializing class
$modules = new Modules();
