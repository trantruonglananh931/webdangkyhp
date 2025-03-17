<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký Học Phần</title>
</head>
<body>
    <h1>Đăng Ký Học Phần</h1>
    <form action="?page=hocphan&action=register" method="post">
        <label for="MaSV">Mã Sinh Viên:</label>
        <input type="text" id="MaSV" name="MaSV" required>
        <br><br>
        <label for="MaHP">Chọn Học Phần:</label>
        <select id="MaHP" name="MaHP" required>
            <?php if ($hocPhanList && $hocPhanList->num_rows > 0): ?>
                <?php while ($row = $hocPhanList->fetch_assoc()): ?>
                    <option value="<?php echo $row['MaHP']; ?>">
                        <?php echo $row['TenHP']; ?>
                    </option>
                <?php endwhile; ?>
            <?php else: ?>
                <option value="">Không có học phần nào</option>
            <?php endif; ?>
        </select>
        <br><br>
        <button type="submit">Đăng Ký</button>
    </form>
</body>
</html>
