<?php
// File: koneksi/database.php

class Database {
    private $host = "localhost";
    private $db_name = "db_simulasi_pbo_ti1c_titameldasafira";
    private $username = "root"; // Sesuaikan dengan username database Anda
    private $password = "";     // Sesuaikan dengan password database Anda
    public $conn;

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new PDO(
                "mysql:host=" . $this->host . ";dbname=" . $this->db_name, 
                $this->username, 
                $this->password
            );
            // Mengatur mode error PDO ke Exception untuk penanganan error yang lebih baik
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Mengatur default fetch mode ke object/array asosiatif
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch(PDOException $exception) {
            echo "Kesalahan Koneksi Database: " . $exception->getMessage();
        }

        return $this->conn;
    }
}
?>