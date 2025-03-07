<?php
   function join_event($event_id) {
    // เชื่อมต่อฐานข้อมูล
    $conn = getConnection();

    // คำสั่ง SQL สำหรับดึงชื่อผู้ใช้และสถานะจากตาราง User และ User_Event
    $query = "SELECT u.Name, ue.status, ue.User_id, ue.event_id 
              FROM User u
              INNER JOIN User_Event ue ON u.User_id = ue.User_id
              WHERE ue.Event_id = ?";

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

function getUserJoinedEvents($user_id) {
    $conn = getConnection();
    
    $query = "SELECT e.Event_id, e.Eventname, e.description, e.image_url, ue.status 
              FROM User_Event ue
              INNER JOIN Event e ON ue.event_id = e.Event_id
              WHERE ue.User_id = ?";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $events = $result->fetch_all(MYSQLI_ASSOC);
    
    $stmt->close();
    $conn->close();
    
    return $events;
}




// randerView('approval_at',[$eid => 'Event_id']);
function updateUserStatus($user_id, $status, $event_id) {
    $conn = getConnection();

    // ตรวจสอบว่า user_id นี้เข้าร่วมกิจกรรม 125 หรือไม่
    $sql = "SELECT * FROM User_Event WHERE User_id = ? AND Event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $event_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {  // ถ้าผู้ใช้เข้าร่วมกิจกรรม 125
        // อัพเดทสถานะของผู้ใช้ในกิจกรรม 125
        $update_sql = "UPDATE User_Event SET status = ? WHERE User_id = ? AND Event_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("sii", $status, $user_id, $event_id);
        if ($update_stmt->execute()) {
            header('Location: /approval_at?eid='.$event_id);
        } else {
            header('Location: /approval_at?eid='.$event_id);
            exit;
        }
        $update_stmt->close();
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $stmt->close();
    $conn->close();
}


function registerUserForEvent($user_id, $event_id) {

    $conn = getConnection(); 

    $sql = "INSERT INTO User_Event (User_id, Event_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    

    $stmt->bind_param("ii", $user_id, $event_id);
    

    if ($stmt->execute()) {

        header("Location: /main");
        exit;
    } else {
        echo "Failed to register for the event.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
