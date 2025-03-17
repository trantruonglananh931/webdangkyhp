<!DOCTYPE html>
<html>
<head>
    <title>Đăng Nhập</title>
</head>
<body>
    <h1>Đăng Nhập</h1>
    <form method="POST" action="index.php?controller=auth&action=login">
        <label for="maSV">Mã Sinh Viên:</label>
        <input type="text" name="maSV" required>
        <button type="submit">Đăng Nhập</button>
    </form>
</body>
</html>
