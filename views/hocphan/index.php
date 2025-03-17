<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Học Phần</title>
</head>
<body>
    <h1>Danh Sách Học Phần</h1>
    <table border="1">
        <tr>
            <th>Mã Học Phần</th>
            <th>Tên Học Phần</th>
            <th>Số Tín Chỉ</th>
            <th>Hành Động</th>
        </tr>
        <?php if ($hocPhanList && $hocPhanList->num_rows > 0): ?>
            <?php while ($row = $hocPhanList->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['MaHP']; ?></td>
                    <td><?php echo $row['TenHP']; ?></td>
                    <td><?php echo $row['SoTinChi']; ?></td>
                    <td>
                        <form action="?page=hocphan&action=register" method="post">
                            <input type="hidden" name="MaHP" value="<?php echo $row['MaHP']; ?>">
                            <input type="hidden" name="MaSV" value="SV001"> <!-- Thay thế bằng mã sinh viên thực tế -->
                            <button type="submit">Đăng Ký</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Không có học phần nào!</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
