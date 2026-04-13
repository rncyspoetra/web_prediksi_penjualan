<?php
require_once __DIR__ . '/../config/database.php';

class AdminModel {

    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function findByUsername($username)
    {
        $stmt = $this->conn->prepare("SELECT * FROM admin WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();

        return $stmt->get_result()->fetch_assoc();
    }
}