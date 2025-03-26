<?php
// ตรวจสอบเมื่อฟอร์มถูกส่ง
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    // รับค่าจากฟอร์ม
    $statusData = $_POST['status'];
    $event_id = $_POST['eid'];


        updateCheckInStatus( $event_id , $statusData);
        $result = getEventById($event_id);
        randerView('check_get', ['event_id' => $result]);
}
?>