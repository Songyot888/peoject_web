
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
