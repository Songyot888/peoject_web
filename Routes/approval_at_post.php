<?php
// ตรวจสอบเมื่อฟอร์มถูกส่ง
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    // รับค่าจากฟอร์ม
    $statusData = $_POST['status'];

    foreach ($statusData as $userId => $status) {
        updateUserStatus($userId, $status); 
    }

    
}
?>