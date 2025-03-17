<!DOCTYPE html>
<html>
<head>
    <title>Thêm Sinh Viên</title>
</head>
<body>
    <h1>Thêm Sinh Viên</h1>
    <form method="POST" action="../sinhvien/create" enctype="multipart/form-data">
        <label>Mã SV:</label>
        <input type="text" name="MaSV" required><br>
        <label>Họ Tên:</label>
        <input type="text" name="HoTen" required><br>
        <label>Giới Tính:</label>
        <input type="text" name="GioiTinh" required><br>
        <label>Ngày Sinh:</label>
        <input type="date" name="NgaySinh" required><br>
        <label>Hình:</label>
        <input type="file" name="Hinh" id="Hinh" accept="image/*" required onchange="previewImage()"><br>
        <img id="preview" src="" alt="Xem trước hình ảnh" style="width: 150px; height: auto; display: none; margin-top: 10px;"><br>
        <label>Mã Ngành:</label>
        <input type="text" name="MaNganh" required><br>
        <input type="submit" value="Thêm">
    </form>

    <script>
    function previewImage() {
        const fileInput = document.getElementById('Hinh');
        const preview = document.getElementById('preview');
        const file = fileInput.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        } else {
            preview.style.display = 'none';
        }
    }
    </script>
</body>
</html>