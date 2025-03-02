<?php

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = login($username, $password);
        if ($result) {
            $_SESSION['alert'] = 'เข้าสู่ระบบสำเร็จ';
           randerView('main_get');
        } else {
            $_SESSION['alert'] = 'เข้าสู่ระบบไม่สำเร็จ';
            randerView('login_get');
        }
    }

?>