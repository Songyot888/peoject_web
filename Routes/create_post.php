<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $activity_name = $_POST['activity-name'] ?? '';
    $participants = $_POST['participants'] ?? 0;
    $start_date = $_POST['start-date'] ?? '';
    $end_date = $_POST['end-date'] ?? '';
    $description = $_POST['description'] ?? '';
    $status = $_POST['status'] ?? 'open';
    $User_id = $_POST['User_id'] ?? '';
    
    // รับข้อมูลไฟล์ภาพ
    $image = $_FILES['image'] ?? null;

    // เรียกใช้ฟังก์ชันเพื่อบันทึกกิจกรรม
    $result = insertEvent($activity_name, $participants, $start_date, $end_date, $description, $status, $User_id, $image);

    if ($result) {
        header('Location: /main');
    } else {
        echo "Insert event failed. Check error log for details.";
    }
}





