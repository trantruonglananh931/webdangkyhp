<?php
class SinhVien {
    private $conn;
    private $table_name = "SinhVien";

    public $MaSV;
    public $HoTen;
    public $GioiTinh;
    public $NgaySinh;
    public $Hinh;
    public $MaNganh;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function readAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " SET MaSV=:MaSV, HoTen=:HoTen, GioiTinh=:GioiTinh, NgaySinh=:NgaySinh, Hinh=:Hinh, MaNganh=:MaNganh";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":MaSV", $this->MaSV);
        $stmt->bindParam(":HoTen", $this->HoTen);
        $stmt->bindParam(":GioiTinh", $this->GioiTinh);
        $stmt->bindParam(":NgaySinh", $this->NgaySinh);
        $stmt->bindParam(":Hinh", $this->Hinh);
        $stmt->bindParam(":MaNganh", $this->MaNganh);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function readOne() {
        $query = "SELECT * FROM sinhvien WHERE MaSV = :MaSV LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':MaSV', $this->MaSV);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($row) {
            $this->HoTen = $row['HoTen'];
            $this->GioiTinh = $row['GioiTinh'];
            $this->NgaySinh = $row['NgaySinh'];
            $this->Hinh = $row['Hinh'];
            $this->MaNganh = $row['MaNganh'];
        }
    }
    
 
     public function update() {
          $query = "UPDATE " . $this->table_name . " 
                    SET HoTen = :HoTen, GioiTinh = :GioiTinh, NgaySinh = :NgaySinh, Hinh = :Hinh, MaNganh = :MaNganh
                    WHERE MaSV = :MaSV";
     
          $stmt = $this->conn->prepare($query);
     
          $stmt->bindParam(":MaSV", $this->MaSV);
          $stmt->bindParam(":HoTen", $this->HoTen);
          $stmt->bindParam(":GioiTinh", $this->GioiTinh);
          $stmt->bindParam(":NgaySinh", $this->NgaySinh);
          $stmt->bindParam(":Hinh", $this->Hinh);
          $stmt->bindParam(":MaNganh", $this->MaNganh);
     
          if ($stmt->execute()) {
          return true;
          }
          return false;
     }
     
     public function delete() {
          $query = "DELETE FROM " . $this->table_name . " WHERE MaSV = ?";
          $stmt = $this->conn->prepare($query);
          $stmt->bindParam(1, $this->MaSV);
     
          if ($stmt->execute()) {
          return true;
          }
          return false;
     }
 
     public function getSinhVienByMaSV($maSV) {
        $query = "SELECT * FROM SinhVien WHERE MaSV = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("s", $maSV);
        $stmt->execute();
        $result = $stmt->get_result();

        // Trả về dữ liệu sinh viên nếu tìm thấy
        return $result->fetch_object();
    }
}
?>
