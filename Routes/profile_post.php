<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST['event_id'] ?? '';
    // var_dump($event_id);
    $result = getEventById($event_id);

   
    if (isset($_POST['toggle'])) {
        if ($result) {
            echo "<script>alert('เปลี่ยนสถานะกิจกรรมเรียบร้อย!'); window.location.href='/profile';</script>";
        } else {
            echo "<script>alert('เกิดข้อผิดพลาดในการเปลี่ยนสถานะกิจกรรม!'); window.location.href='/profile';</script>";
        }
    }
    elseif (isset($_POST['de'])) {
        randerView('detail_get', ['event_id' => $result]);
    }
}