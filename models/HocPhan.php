<?php
class HocPhan {
    private $conn;

    // Hàm khởi tạo
    public function __construct($db) {
        $this->conn = $db;
    }

    // Lấy danh sách học phần
    public function getAllHocPhan() {
        $query = "SELECT * FROM HocPhan";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
