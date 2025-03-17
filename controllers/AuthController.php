<?php
require_once 'app/models/SinhVien.php';

class AuthController {
    public function showLoginForm() {
        require_once 'app/views/auth/login.php';
    }

    public function login() {
        $maSV = $_POST['maSV'];
        $sinhVienModel = new SinhVien();
        $sinhVien = $sinhVienModel->findByMaSV($maSV);

        if ($sinhVien) {
            session_start();
            $_SESSION['maSV'] = $sinhVien['MaSV'];
            header("Location: index.php?controller=hocphan&action=register");
        } else {
            $error = "Mã sinh viên không hợp lệ!";
            require_once 'app/views/auth/login.php';
        }
    }
}
?>
