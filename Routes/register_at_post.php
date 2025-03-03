<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'] ?? null;
    $event_id = $_POST['event_id'] ?? null;

    // ตรวจสอบว่า user_id และ event_id ถูกส่งมาหรือไม่
    if ($user_id && $event_id) {
        // เรียกฟังก์ชัน insertUserEvent เพื่อแทรกข้อมูล
        $result = insertUserEvent($user_id, $event_id);

        // ส่งผลลัพธ์กลับไปให้ JavaScript
        if ($result) {
            echo "Registration successful";
        } else {
            echo "Failed to register";
        }
    } else {
        echo "Invalid input";
    }
}
?>