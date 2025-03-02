<?php
   function join_event($event_id) {
    // เชื่อมต่อฐานข้อมูล
    $conn = getConnection();

    // คำสั่ง SQL สำหรับดึงชื่อผู้ใช้และสถานะจากตาราง User และ User_Event
    $query = "SELECT u.Name, ue.status, ue.User_id, ue.event_id 
              FROM User u
              INNER JOIN User_Event ue ON u.User_id = ue.User_id
              WHERE ue.event_id = ?";

    // เตรียมคำสั่ง SQL
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $event_id);  // รับค่า event_id
    $stmt->execute();
    $result = $stmt->get_result();  // ดึงผลลัพธ์

    // เก็บผลลัพธ์ในอาร์เรย์
    $users = $result->fetch_all(MYSQLI_ASSOC);

    // ปิดการเชื่อมต่อ
    $stmt->close();
    $conn->close();

    return $users;
}


function updateUserEventStatus($user_id, $event_id, $status) {
    $conn = getConnection();
    $updateQuery = "UPDATE User_Event SET status = ? WHERE User_id = ? AND event_id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("sii", $status, $user_id, $event_id);
    
    if ($stmt->execute()) {
        echo "สถานะได้ถูกอัปเดต!";
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตสถานะ!";
    }

    $stmt->close();
    $conn->close();
}
