<?php
// ตรวจสอบเมื่อฟอร์มถูกส่ง
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    // รับค่าจากฟอร์ม
    $statusData = $_POST['status'];

    // เรียกใช้ฟังก์ชันเพื่ออัปเดตสถานะสำหรับผู้ใช้แต่ละคน
    foreach ($statusData as $userId => $status) {
        updateUserStatus($userId, $status); 
    }
}
?>