<?php
function insertEvent($activity_name, $participants, $start_date, $end_date, $description, $status, $User_id): array|bool
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
        return false;  // Prepare failed, return false
    }

    $stmt->bind_param('sissssi', $activity_name, $participants, $start_date, $end_date, $description, $status, $User_id);

    // Execute the query
    if ($stmt->execute()) {
        // Fetch the last inserted Event_id
        $event_id = $conn->insert_id;  // This gives you the last inserted ID

        // Close the statement and connection
        $stmt->close();
        $conn->close();

        // Return the inserted event details as an associative array
        return [
            'Event_id' => $event_id,
            'Eventname' => $activity_name,
            'Max_participants' => $participants,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'description' => $description,
            'status_event' => $status,
            'User_id' => $User_id
        ];
    } else {
        // Log the error and return false if execution failed
        error_log("Execute failed: " . $stmt->error);
        $stmt->close();
        $conn->close();
        return false;  // Execution failed, return false
    }
}


function getEventById(int $id): array|bool
{
    $conn = getConnection();
    $sql = 'select * from Event where Event_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return false;
    }
    return $result->fetch_assoc();
}