<?php
require_once 'config/database.php';

class DangKy {
    private $conn;
    private $table = "ChiTietDangKy";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function register($maDK, $maHP) {
        $query = "INSERT INTO " . $this->table . " (MaDK, MaHP) VALUES (:maDK, :maHP)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':maDK', $maDK);
        $stmt->bindParam(':maHP', $maHP);
        $stmt->execute();
    }
}
?>
