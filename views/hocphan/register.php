<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Học Phần</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .navbar {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-register {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-register:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Test1</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="#">Sinh Viên</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Học Phần</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Đăng Kí</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Đăng Nhập</a></li>
            </ul>
        </div>
    </nav>

    <!-- Nội dung chính -->
    <div class="container">
        <h1 class="text-center">DANH SÁCH HỌC PHẦN</h1>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Mã Học Phần</th>
                    <th>Tên Học Phần</th>
                    <th>Số Tín Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($hocPhans as $hocPhan): ?>
                <tr>
                    <td><?= $hocPhan['MaHP'] ?></td>
                    <td><?= $hocPhan['TenHP'] ?></td>
                    <td><?= $hocPhan['SoTinChi'] ?></td>
                    <td>
                        <form action="?page=hocphan&action=register" method="post">
                            <input type="hidden" name="MaHP" value="<?= $hocPhan['MaHP'] ?>">
                            <input type="hidden" name="MaSV" value="SV001"> <!-- Thay bằng mã sinh viên thực -->
                            <button type="submit" class="btn-register">Đăng Kí</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
