
<?php
function insertEvent($activity_name, $participants, $start_date, $end_date, $description, $status, $User_id, $images) {
    $conn = getConnection();

    // อัปโหลดรูปภาพและบันทึกรูปแรกลงใน Event
    $uploadDir = 'uploads/event/';
    $backgroundImagePath = null;

    if (isset($images)) {
        $backgroundImage = $images['tmp_name'][0]; // รูปแรกจะเป็นภาพพื้นหลัง
        $backgroundImagePath = $uploadDir . basename($images['name'][0]);
        move_uploaded_file($backgroundImage, $backgroundImagePath);
    }

    // SQL คำสั่งบันทึกข้อมูลกิจกรรม
    $sql = 'INSERT INTO Event (Eventname, Max_participants, start_date, end_date, description, status_event, User_id, image_url) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sissssss', $activity_name, $participants, $start_date, $end_date, $description, $status, $User_id, $backgroundImagePath);

    if ($stmt->execute()) {
        $event_id = $stmt->insert_id;  // Get the inserted event's ID
        $stmt->close();
        return $event_id;
    } else {
        error_log("Execute failed: " . $stmt->error);
        $stmt->close();
        return false;
    }
}


function getEventById($eid) {
    $conn = getConnection();
    $sql = "SELECT * FROM Event WHERE Event_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eid);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}


function getAllEvents() {
    $conn = getConnection();
    $sql = "SELECT * FROM Event";
    $result = $conn->query($sql);
    return $result->fetch_all(MYSQLI_ASSOC);
}


function updateEvent($eid, $Eventname, $Max_participants, $start_date, $end_date, $description) {
    $conn = getConnection();
    $sql = "UPDATE Event SET Eventname=?, Max_participants=?, description=?, start_date=?, end_date=? WHERE Event_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisssi", $Eventname, $Max_participants, $description, $start_date, $end_date, $eid);

    // Execute the query
    if ($stmt->execute()) {
        // ตรวจสอบว่ามีการอัพเดตแถวใดๆ หรือไม่
        if ($stmt->affected_rows > 0) {
            return true;  // ข้อมูลอัพเดตแล้ว
        } else {
            echo "ไม่มีการอัพเดตข้อมูล เนื่องจากไม่พบ Event_id ที่ตรงกับที่กำหนด";
            return false;
        }
    } else {
        echo "Error executing query: " . $stmt->error;
        return false;
    }
}

function getSearch(): mysqli_result|bool {
    $conn = getConnection();
    $sql = 'select * from Event';
    $result = $conn->query($sql);
    return $result;
}

function getUserEventsById($user_id) {
    $conn = getConnection();

    // เขียน SQL Query เพื่อดึงกิจกรรมที่ผู้ใช้สร้าง
    $sql = "SELECT * FROM Event WHERE User_id = ?";  // เปลี่ยนเป็นชื่อของตารางและฟิลด์ตามที่คุณใช้
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id); // ผูกตัวแปร $user_id กับ query
    $stmt->execute();

    $result = $stmt->get_result();
    $events = [];

    // ดึงข้อมูลกิจกรรมทั้งหมดที่ตรงกับ user_id
    while ($event = $result->fetch_assoc()) {
        $events[] = $event;
    }

    return $events;
}

