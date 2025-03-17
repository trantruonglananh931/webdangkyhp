<?php
include_once '../../config/database.php';
include_once '../../models/SinhVien.php';
$database = new Database();
$db = $database->getConnection();

$sinhvien = new SinhVien($db);
$stmt = $sinhvien->readAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Danh sách Sinh Viên</title>
</head>
<body>
    <h1>Danh sách Sinh Viên</h1>
    <a href="create.php">Thêm Sinh Viên</a>
    <table border="1">
        <tr>
            <th>Mã SV</th>
            <th>Họ Tên</th>
            <th>Giới Tính</th>
            <th>Ngày Sinh</th>
            <th>Hình</th>
            <th>Mã Ngành</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['MaSV']; ?></td>
                <td><?php echo $row['HoTen']; ?></td>
                <td><?php echo $row['GioiTinh']; ?></td>
                <td><?php echo $row['NgaySinh']; ?></td>
                <td>
                    <img src="<?php echo $row['Hinh']; ?>" alt="Hình ảnh" style="width: 100px; height: auto;">
                </td>
                <td><?php echo $row['MaNganh']; ?></td>
                <td>
                    <a href="edit.php?MaSV=<?php echo $row['MaSV']; ?>">Sửa</a>
                    <a href="detail.php?MaSV=<?php echo $row['MaSV']; ?>">Chi tiết</a>
                    <form method="POST" action="delete.php" style="display:inline;">
                        <input type="hidden" name="MaSV" value="<?php echo $row['MaSV']; ?>">
                        <input type="submit" name="delete" value="Xóa">
                    </form>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>