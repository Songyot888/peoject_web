<?php
<<<<<<< HEAD
randerView('checkin_get');
?>
=======
// ตรวจสอบว่า $event_id ถูกส่งมาจาก URL หรือไม่
if (isset($_GET['event_id'])) {
    $event_id = $_GET['event_id'];  // ถ้ามี, ใช้ค่าจาก URL
} else {
    $event_id = null;  // ถ้าไม่มี, กำหนดให้เป็น null หรือค่าที่ต้องการ
}

// ส่งตัวแปรไปยัง view
randerView('checkin_get', ['event_id' => $event_id]);
?>
>>>>>>> 1ef57e9a19da8664ed1a0efcf543328bbb52a88c
