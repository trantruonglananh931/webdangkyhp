<?php
class HocPhan {
    private $conn;
    private $table_name = "HocPhan";

    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy toàn bộ danh sách học phần
    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Đăng ký học phần
    public function registerHocPhan($maSV, $maHP) {
        $query = "INSERT INTO DangKyHocPhan (MaSV, MaHP) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ss", $maSV, $maHP);
        return $stmt->execute();
    }
}
?>
