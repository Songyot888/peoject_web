<?php
function insertEvent($activity_name, $participants, $start_date, $end_date, $description, $status, $User_id): bool
{
    $conn = getConnection();
    if ($conn->connect_error) {
        error_log("Connection failed: " . $conn->connect_error);
        return false;
    }

    $sql = 'INSERT INTO Event (Eventname, Max_participants, start_date, end_date, description, status_event, User_id) VALUES (?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        error_log("Prepare failed: " . $conn->error);
        $conn->close();
        return false;
    }

    $stmt->bind_param('sissssi', $activity_name, $participants, $start_date, $end_date, $description, $status, $User_id);

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
