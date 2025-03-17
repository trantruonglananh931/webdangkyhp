
<?php
session_start(); // Bắt đầu session để lưu thông tin đăng nhập

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once 'D:\webdangkyhp\config\database.php'; // Kết nối cơ sở dữ liệu

    $maSV = $_POST['MaSV'];

    // Kiểm tra MaSV trong database
    $query = "SELECT * FROM SinhVien WHERE MaSV = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $maSV);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Lưu thông tin MaSV vào session
        $_SESSION['MaSV'] = $maSV;
        header("Location: hocphan.php"); // Chuyển hướng đến trang Học Phần
        exit();
    } else {
        $error = "Mã sinh viên không hợp lệ!";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Nhập</title>
</head>
<body>
    <h1>ĐĂNG NHẬP</h1>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

    <form method="POST" action="hocphan.php">
        <label for="MaSV">MaSV:</label>
        <input type="text" id="MaSV" name="MaSV" required>
        <button type="submit">Đăng Nhập</button>
    </form>
</body>
</html>
