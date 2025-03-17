<?php
include_once '../../config/database.php';
include_once '../../models/SinhVien.php';

$database = new Database();
$db = $database->getConnection();

$sinhvien = new SinhVien($db);

if (isset($_GET['MaSV'])) {
    $sinhvien->MaSV = $_GET['MaSV'];
    $sinhvien->readOne();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sinhvien->MaSV = $_POST['MaSV'];

    if ($sinhvien->delete()) {
        echo "Sinh viên đã được xóa thành công.";
    } else {
        echo "Không thể xóa sinh viên.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Xóa Sinh Viên</title>
</head>
<body>
    <h1>Xóa Sinh Viên</h1>
    <p>Bạn có chắc chắn muốn xóa sinh viên?</p>
    <p><strong>Mã SV:</strong> <?php echo $sinhvien->MaSV; ?></p>
    <p><strong>Họ Tên:</strong> <?php echo $sinhvien->HoTen; ?></p>
    <form method="POST" action="">
        <input type="hidden" name="MaSV" value="<?php echo $sinhvien->MaSV; ?>">
        <input type="submit" value="Xóa">
        <a href="index.php">Hủy</a>
    </form>
</body>
</html>
