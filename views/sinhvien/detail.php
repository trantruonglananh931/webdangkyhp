<?php
include_once '../../config/database.php';
include_once '../../models/SinhVien.php';


$database = new Database();
$db = $database->getConnection();

$sinhvien = new SinhVien($db);

if (isset($_GET['MaSV'])) {
    $sinhvien->MaSV = $_GET['MaSV'];
    $sinhvien->readOne();
} else {
    echo "Không tìm thấy mã sinh viên.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Chi tiết Sinh Viên</title>
</head>
<body>
    <h1>Chi tiết Sinh Viên</h1>
    <?php if (!empty($sinhvien->MaSV)) { ?>
        <p><strong>Mã SV:</strong> <?php echo $sinhvien->MaSV; ?></p>
        <p><strong>Họ Tên:</strong> <?php echo $sinhvien->HoTen; ?></p>
        <p><strong>Giới Tính:</strong> <?php echo $sinhvien->GioiTinh; ?></p>
        <p><strong>Ngày Sinh:</strong> <?php echo $sinhvien->NgaySinh; ?></p>
        <p><strong>Hình:</strong></p>
        <img src="<?php echo $sinhvien->Hinh; ?>" alt="Hình ảnh Sinh Viên" style="width: 150px; height: auto;">
        <p><strong>Mã Ngành:</strong> <?php echo $sinhvien->MaNganh; ?></p>
    <?php } else { ?>
        <p>Không tìm thấy thông tin sinh viên.</p>
    <?php } ?>
    <a href="index.php">Quay lại danh sách</a>
</body>
</html>
