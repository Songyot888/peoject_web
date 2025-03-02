<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        foreach ($_POST as $user_id => $status) {
            if (strpos($user_id, 'status') === 0) {
                $user_id = substr($user_id, 6);  // ตัดคำว่า 'status' ออก
                // อัปเดตสถานะในฐานข้อมูล
                updateUserEventStatus($user_id, $event_id, $status);
            }
        }
    }