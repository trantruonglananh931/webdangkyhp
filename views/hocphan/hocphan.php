<?php
session_start(); // Bắt đầu session

if (!isset($_SESSION['MaSV'])) {
    header("Location: login.php"); // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
    exit();
}

include_once 'D:\webdangkyhp\config\database.php'; // Kết nối cơ sở dữ liệu

// Lấy danh sách học phần từ database
$query = "SELECT * FROM HocPhan";
$result = $conn->query($query);

// Xử lý đăng ký học phần
if (isset($_GET['MaHP'])) {
    $maSV = $_SESSION['MaSV'];
    $maHP = $_GET['MaHP'];

    // Kiểm tra xem sinh viên đã đăng ký học phần này chưa
    $checkQuery = "SELECT * FROM DangKy WHERE MaSV = ? AND MaHP = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param("ss", $maSV, $maHP);
    $stmt->execute();
    $checkResult = $stmt->get_result();

    if ($checkResult->num_rows == 0) {
        // Thêm học phần vào bảng đăng ký
        $insertQuery = "INSERT INTO DangKy (MaSV, MaHP) VALUES (?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param("ss", $maSV, $maHP);
        $stmt->execute();
        $message = "Đăng ký thành công!";
    } else {
        $message = "Bạn đã đăng ký học phần này!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Học Phần</title>
</head>
<body>
    <h1>DANH SÁCH HỌC PHẦN</h1>
    <?php if (isset($message)) echo "<p style='color: green;'>$message</p>"; ?>

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
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['MaHP']; ?></td>
                    <td><?php echo $row['TenHP']; ?></td>
                    <td><?php echo $row['SoTinChi']; ?></td>
                    <td>
                        <a href="hocphan.php?MaHP=<?php echo $row['MaHP']; ?>" style="color: green;">Đăng Ký</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <a href="logout.php">Đăng Xuất</a>
</body>
</html>
