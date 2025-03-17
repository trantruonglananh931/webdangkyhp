<?php
include_once 'D:\webdangkyhp\config\database.php';
include_once 'D:\webdangkyhp\models\SinhVien.php';

$database = new Database();
$db = $database->getConnection();

$sinhvien = new SinhVien($db);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sinhvien->MaSV = $_POST['MaSV'];
    $sinhvien->HoTen = $_POST['HoTen'];
    $sinhvien->GioiTinh = $_POST['GioiTinh'];
    $sinhvien->NgaySinh = $_POST['NgaySinh'];
    $sinhvien->Hinh = $_POST['Hinh'];
    $sinhvien->MaNganh = $_POST['MaNganh'];

    if ($sinhvien->create()) {
        echo "Sinh viên đã được thêm thành công.";
    } else {
        echo "Không thể thêm sinh viên.";
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sinhvien->MaSV = $_POST['MaSV'];
    $sinhvien->HoTen = $_POST['HoTen'];
    $sinhvien->GioiTinh = $_POST['GioiTinh'];
    $sinhvien->NgaySinh = $_POST['NgaySinh'];
    $sinhvien->MaNganh = $_POST['MaNganh'];

    // Xử lý tệp hình ảnh
    if (isset($_FILES['Hinh']) && $_FILES['Hinh']['error'] == 0) {
        $targetDir = "../../assets/"; // Thư mục lưu hình ảnh
        $fileName = basename($_FILES['Hinh']['name']);
        $targetFilePath = $targetDir . $fileName;

        // Di chuyển tệp tải lên vào thư mục đích
        if (move_uploaded_file($_FILES['Hinh']['tmp_name'], $targetFilePath)) {
            $sinhvien->Hinh = "assets/" . $fileName; // Lưu đường dẫn hình ảnh vào database
        } else {
            echo "Lỗi khi tải lên hình ảnh.";
            exit;
        }
    } else {
        echo "Vui lòng chọn một hình ảnh hợp lệ.";
        exit;
    }

    // Gọi phương thức thêm sinh viên
    if ($sinhvien->create()) {
        echo "Thêm sinh viên thành công.";
    } else {
        echo "Không thể thêm sinh viên.";
    }
}

 if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete'])) {
     $sinhvien->MaSV = $_POST['MaSV'];
 
     if ($sinhvien->delete()) {
         echo "Sinh viên đã được xóa thành công.";
     } else {
         echo "Không thể xóa sinh viên.";
     }
 }

 if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['MaSV'])) {
     $sinhvien->MaSV = $_GET['MaSV'];
     $sinhvien->readOne();
 
     echo "Họ Tên: " . $sinhvien->HoTen;
     echo "Giới Tính: " . $sinhvien->GioiTinh;
     echo "Ngày Sinh: " . $sinhvien->NgaySinh;
     echo "Hình: " . $sinhvien->Hinh;
     echo "Mã Ngành: " . $sinhvien->MaNganh;
 }
 
 
 
?>
