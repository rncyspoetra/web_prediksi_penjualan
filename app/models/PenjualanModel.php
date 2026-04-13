<?php

require_once __DIR__ . '/../config/database.php';

class PenjualanModel {

    private $conn;

    public function __construct()
    {
        $this->conn = Database::connect();
    }

    public function getAll()
    {
        return $this->conn->query("SELECT * FROM penjualan")->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO penjualan 
            (id_admin, bulan_penjualan, shif, pentol, frozen, status_penjualan)
            VALUES (?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "isssss",
            $data['id_admin'],
            $data['bulan'],
            $data['shif'],
            $data['pentol'],
            $data['frozen'],
            $data['status']
        );

        return $stmt->execute();
    }

    public function delete($id)
    {
        return $this->conn->query("DELETE FROM penjualan WHERE id_penjualan = $id");
    }

    public function countAll()
    {
        $result = $this->conn->query("SELECT COUNT(*) as total FROM penjualan");
        return $result->fetch_assoc()['total'];
    }

    public function update($data)
    {
        $stmt = $this->conn->prepare("
            UPDATE penjualan SET 
            bulan_penjualan=?, shif=?, pentol=?, frozen=?, status_penjualan=?
            WHERE id_penjualan=?
        ");

        $stmt->bind_param(
            "sssssi",
            $data['bulan'],
            $data['shif'],
            $data['pentol'],
            $data['frozen'],
            $data['status'],
            $data['id']
        );

        return $stmt->execute();
    }
    
    public function getAllForPython()
    {
        $query = "SELECT bulan_penjualan, shif, pentol, frozen, status_penjualan FROM penjualan";
        $result = $this->conn->query($query);

        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getStatusTerbanyak()
    {
        $result = $this->conn->query("
            SELECT status_penjualan, COUNT(*) as total
            FROM penjualan
            GROUP BY status_penjualan
            ORDER BY total DESC
            LIMIT 1
        ");

        return $result->fetch_assoc();
    }
}