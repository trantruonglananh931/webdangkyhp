<?php
include_once 'D:\webdangkyhp\models\HocPhan.php';

class HocPhanController {
    private $hocPhanModel;

    public function __construct($db) {
        $this->hocPhanModel = new HocPhan($db);
    }

    // Hiển thị danh sách học phần
    public function index() {
        $hocPhanList = $this->hocPhanModel->getAll();
        include_once 'views/hocphan/index.php';
    }

    // Đăng ký học phần
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $maSV = $_POST['MaSV']; // Mã sinh viên
            $maHP = $_POST['MaHP']; // Mã học phần

            if ($this->hocPhanModel->registerHocPhan($maSV, $maHP)) {
                echo "<script>alert('Đăng ký học phần thành công!');</script>";
            } else {
                echo "<script>alert('Đăng ký học phần thất bại!');</script>";
            }
        }

        // Hiển thị form đăng ký học phần
        $hocPhanList = $this->hocPhanModel->getAll();
        include_once 'views/hocphan/register.php';
    }
}
?>
