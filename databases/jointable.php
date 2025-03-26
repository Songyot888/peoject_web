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
    
    $query = "SELECT e.Event_id, e.Eventname, e.description, e.image_url, ue.status ,ue.check_in
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
        $update_stmt->execute();
        $update_stmt->close();
    }

    // ปิดการเชื่อมต่อฐานข้อมูล
    $stmt->close();
    $conn->close();
}


function registerUserForEvent($user_id, $event_id) {

    $conn = getConnection(); 
    $conn->query("ALTER TABLE User AUTO_INCREMENT = 1");

    $sql = "INSERT INTO User_Event (User_id, Event_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    

    $stmt->bind_param("ii", $user_id, $event_id);
    

    if ($stmt->execute()) {

        header("Location: /main");
        exit;
    } else {
        echo "Failed to register for the event.";
    }

    $stmt->close();
    $conn->close();
}


function updateCheckIn($userId, $eventId, $checkInStatus) {
    // Connect to the database
    $conn = getConnection(); 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "UPDATE User_Event SET check_in = ? WHERE user_id = ? AND event_id = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("iii", $checkInStatus, $userId, $eventId);
        $stmt->execute();
        $stmt->close();
    }

    $conn->close();
}
function updateCheckinImage($user_id, $image) {
    $conn = getConnection();

    if (isset($image) && $image['error'] == 0) {
        $uploadDir = 'uploads/checkin/'; 
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // สร้างชื่อไฟล์ใหม่ให้ไม่ซ้ำ
        $fileExt = pathinfo($image['name'], PATHINFO_EXTENSION);
        $uploadFile = $uploadDir . uniqid($user_id . "_") . "." . $fileExt;

        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            $imagePath = $uploadFile; 
        } else {
            error_log("❌ Image upload failed");
            return false;
        }
    } else {
        // ถ้าไม่มีการอัปโหลดใหม่ ให้ดึงค่ารูปเดิมจากฐานข้อมูล
        $sql = "SELECT checkin_img FROM User_Event WHERE user_id=?";
        $stmt = $conn->prepare($sql);
        if (!$stmt) {
            error_log("❌ Prepare failed: " . $conn->error);
            return false;
        }

        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $stmt->bind_result($currentImagePath);
        $stmt->fetch();
        $stmt->close();

        $imagePath = $currentImagePath;
    }

    // อัปเดตรูปภาพลงฐานข้อมูล
    $sql = "UPDATE User_Event SET checkin_img=? WHERE user_id=?";
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("❌ Prepare failed: " . $conn->error);
        return false;
    }

    $stmt->bind_param("si", $imagePath, $user_id);

    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            error_log("✅ Check-in image updated successfully");
            return true;
        } else {
            error_log("⚠️ No check-in image updated, affected rows: " . $stmt->affected_rows);
            return false;
        }
    } else {
        error_log("❌ Execute failed: " . $stmt->error);
        return false;
    }
}


function getCheckinImage($user_id) {
    global $conn;
    $stmt = $conn->prepare("SELECT checkin_img FROM User_Event WHERE user_id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    return $result->fetch_assoc();
}

