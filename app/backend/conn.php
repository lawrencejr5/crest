<?php

include __DIR__ . "/constants.php";

class Connection
{
    private $db_user;
    private $db_name;
    private $db_host;
    private $db_pass;
    public $conn;

    public function __construct()
    {
        $this->db_user = DB_USER;
        $this->db_name = DB_NAME;
        $this->db_host = DB_HOST;
        $this->db_pass = DB_PASS;

        try {
            $this->conn = new PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Failed, " . $e->getMessage();
        }
    }
}
