<!DOCTYPE html>
<html>
<head>
    <title>Chỉnh sửa Sinh Viên</title>
</head>
<body>
    <h1>Chỉnh sửa Sinh Viên</h1>
    <form method="POST" action="">
        <label>Mã SV:</label>
        <input type="text" name="MaSV" value="<?php echo $sinhvien->MaSV; ?>" readonly><br>
        <label>Họ Tên:</label>
        <input type="text" name="HoTen" value="<?php echo $sinhvien->HoTen; ?>" required><br>
        <label>Giới Tính:</label>
        <input type="text" name="GioiTinh" value="<?php echo $sinhvien->GioiTinh; ?>" required><br>
        <label>Ngày Sinh:</label>
        <input type="date" name="NgaySinh" value="<?php echo $sinhvien->NgaySinh; ?>" required><br>
        <label>Hình:</label>
        <input type="text" name="Hinh" value="<?php echo $sinhvien->Hinh; ?>" required><br>
        <img src="<?php echo $sinhvien->Hinh; ?>" alt="Hình ảnh Sinh Viên" style="width: 150px; height: auto; margin-top: 10px;"><br>
        <label>Mã Ngành:</label>
        <input type="text" name="MaNganh" value="<?php echo $sinhvien->MaNganh; ?>" required><br>
        <input type="submit" value="Cập nhật">
    </form>
</body>
</html>
