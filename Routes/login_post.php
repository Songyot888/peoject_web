<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']);

        if (login($username, $password, $remember)) {
            $_SESSION['alert'] = 'เข้าสู่ระบบสำเร็จ';
            randerView('main_get');
        } else {
            $_SESSION['alert'] = 'เข้าสู่ระบบไม่สำเร็จ';
            randerView('login_get');
        }
    }
}
?>