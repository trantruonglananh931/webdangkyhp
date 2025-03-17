<?php
// Autoload các file cần thiết
include_once 'D:\webdangkyhp\config\database.php';
include_once 'models/SinhVien.php';
include_once 'models/HocPhan.php';
include_once 'controllers/SinhVienController.php';
include_once 'controllers/HocPhanController.php';
include_once 'controllers/DangNhapController.php';

// Khởi tạo kết nối cơ sở dữ liệu
$database = new Database();
$db = $database->getConnection();

// Lấy tham số từ URL (route)
$page = isset($_GET['page']) ? $_GET['page'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

// Điều hướng đến các controller và view tương ứng
switch ($page) {
    case 'sinhvien':
        $controller = new SinhVienController($db);
        switch ($action) {
            case 'index': // Hiển thị danh sách sinh viên
                $controller->index();
                break;
            case 'create': // Thêm sinh viên
                $controller->create();
                break;
            case 'edit': // Sửa sinh viên
                $controller->edit();
                break;
            case 'delete': // Xóa sinh viên
                $controller->delete();
                break;
            case 'detail': // Chi tiết sinh viên
                $controller->detail();
                break;
            default:
                echo "Hành động không hợp lệ!";
        }
        break;

    case 'hocphan':
        $controller = new HocPhanController($db);
        switch ($action) {
            case 'index': // Hiển thị danh sách học phần
                $controller->index();
                break;
            case 'register': // Đăng ký học phần
                $controller->register();
                break;
            default:
                echo "Hành động không hợp lệ!";
        }
        break;

    case 'dangnhap':
        $controller = new DangNhapController($db);
        switch ($action) {
            case 'index': // Giao diện đăng nhập
                $controller->index();
                break;
            case 'login': // Xử lý đăng nhập
                $controller->login();
                break;
            case 'logout': // Xử lý đăng xuất
                $controller->logout();
                break;
            default:
                echo "Hành động không hợp lệ!";
        }
        break;

    default:
        echo "<h1>Chào mừng đến với hệ thống quản lý sinh viên!</h1>";
        break;
}
?>
