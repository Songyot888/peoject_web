<?php
// ตรวจสอบเมื่อฟอร์มถูกส่ง
// ตรวจสอบเมื่อฟอร์มถูกส่ง
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    // รับค่าจากฟอร์ม
    $statusData = $_POST['status'];
    $event_id = $_POST['eid'];

    // สามารถใช้งานกับทุกกิจกรรมที่ส่งมาจากฟอร์ม
    foreach ($statusData as $userId => $status) {
        updateUserStatus($userId, $status, $event_id);  // ส่ง event_id ที่ได้รับจากฟอร์มไปด้วย
    }
}

?>