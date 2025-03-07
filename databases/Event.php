<?php
function insertEvent($activity_name, $participants, $start_date, $end_date, $description, $status, $User_id, $image) {
    // เชื่อมต่อฐานข้อมูล
    $conn = getConnection();
    $conn->query("ALTER TABLE User AUTO_INCREMENT = 1");

    if (isset($image)) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($image['name']);
        if (move_uploaded_file($image['tmp_name'], $uploadFile)) {
            $imagePath = $uploadFile; 
        } else {
            error_log("Image upload failed");
            return false;
        }
    } else {
        $imagePath = null;  // ถ้าไม่มีการอัปโหลดภาพ
    }

    // SQL คำสั่งบันทึกข้อมูลกิจกรรม
    $sql = 'INSERT INTO Event (Eventname, Max_participants, start_date, end_date, description, status_event, User_id, image_url) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        $conn->close();
        return false;
    }

    $stmt->bind_param('sissssss', $activity_name, $participants, $start_date, $end_date, $description, $status, $User_id, $imagePath);

    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        return true;
    } else {
        error_log("Execute failed: " . $stmt->error);
        $stmt->close();
        $conn->close();
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


function getAllEvents(): mysqli_result|bool {
    $conn = getConnection();
    $sql = "SELECT * FROM Event";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
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

function getJoinedEventsById($user_id) {
    $conn = getConnection();

    // เขียน SQL Query เพื่อดึงกิจกรรมที่ผู้ใช้เข้าร่วม
    $sql = "SELECT * FROM Event WHERE Event_id IN (SELECT Event_id FROM JoinEvent WHERE User_id = ?)";
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

function getSearchByKeyword(string $keyword, string $startDate = '', string $endDate = ''): mysqli_result|bool {
    $conn = getConnection();
    $sql = "SELECT * FROM Event WHERE Eventname LIKE ?";
    $params = ["%$keyword%"];
    $types = 's';

    if (!empty($startDate) && !empty($endDate)) {
        // ถ้ากำหนดทั้ง Start และ End
        $sql .= " AND start_date >= ? AND end_date <= ?";
        $params[] = $startDate;
        $params[] = $endDate;
        $types .= 'ss';
    } elseif (!empty($startDate)) {
        // ถ้ามีแต่ Start
        $sql .= " AND start_date >= ?";
        $params[] = $startDate;
        $types .= 's';
    } elseif (!empty($endDate)) {
        // ถ้ามีแต่ End
        $sql .= " AND end_date <= ?";
        $params[] = $endDate;
        $types .= 's';
    }

    // Debug SQL และพารามิเตอร์ที่ส่งไป
    error_log("SQL: $sql");
    error_log("Params: " . implode(", ", $params));

    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        error_log("Prepare failed: " . $conn->error);
        return false;
    }

    $stmt->bind_param($types, ...$params);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();
    $conn->close();
    return $result;
}









