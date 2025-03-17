<?php
session_start(); // Bắt đầu session

// Kiểm tra xem sinh viên đã đăng nhập chưa
if (!isset($_SESSION['MaSV'])) {
    header("Location: login.php"); // Chuyển hướng về trang đăng nhập nếu chưa đăng nhập
    exit();
}

include_once 'D:\webdangkyhp\config\database.php'; // Kết nối cơ sở dữ liệu
include_once 'D:\webdangkyhp\models\HocPhan.php'; // Gọi Models HocPhan

// Tạo đối tượng HocPhan
$hocPhanModel = new HocPhan($conn);

// Lấy danh sách học phần
$hocPhanList = $hocPhanModel->getAllHocPhan();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Học Phần</title>
</head>
<body>
    <h1>DANH SÁCH HỌC PHẦN</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Mã Học Phần</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $hocPhanList->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['MaHP']; ?></td>
                    <td><?php echo $row['TenHP']; ?></td>
                    <td><?php echo $row['SoTinChi']; ?></td>
                    <td>
                        <a href="dangky.php?MaHP=<?php echo $row['MaHP']; ?>" style="color: green;">Đăng Ký</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="logout.php">Đăng Xuất</a>
</body>
</html>
