<?php
class DangNhap {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Kiểm tra thông tin đăng nhập
    public function checkLogin($maSV) {
        $query = "SELECT * FROM SinhVien WHERE MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $maSV);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
