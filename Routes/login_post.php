<?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember = isset($_POST['remember']);

        if (login($username, $password)) {
            $_SESSION['alert'] = 'เข้าสู่ระบบสำเร็จ';
            header("Location: main_get.php"); // เปลี่ยนหน้าไป main_get.php
            exit();
        } else {
            $_SESSION['alert'] = 'เข้าสู่ระบบไม่สำเร็จ';
            header("Location: login_get.php"); // กลับไปหน้า login
            exit();
        }
        
        
    }
}
?>