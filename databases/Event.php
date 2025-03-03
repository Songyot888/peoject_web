<?php
function insertEvent($activity_name, $participants, $start_date, $end_date, $description, $status, $User_id): bool
{
    $conn = getConnection();
    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
        return false;  // Connection failed, return false
    }

    $sql = 'INSERT INTO Event (Eventname, Max_participants, start_date, end_date, description, status_event, User_id) 
            VALUES (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        $conn->close();
        return false;
    }

    $stmt->bind_param('sissssi', $activity_name, $participants, $start_date, $end_date, $description, $status, $User_id);

    if ($stmt->execute()) {
        $event_id = $conn->insert_id;

        $stmt->close();
        $conn->close();


        return true;
    } else {

        error_log("Execute failed: " . $stmt->error);
        $stmt->close();
        $conn->close();
        return false;  // Execution failed, return false
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
