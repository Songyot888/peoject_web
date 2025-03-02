<?php
function insertEvent($activity_name, $participants, $start_date, $end_date, $description, $status, $User_id): bool
{
    $conn = getConnection();
    
    // Step 1: Check if the User_id exists in the User table
    $checkUserQuery = "SELECT User_id FROM User WHERE User_id = ?";
    $stmt = $conn->prepare($checkUserQuery);
    $stmt->bind_param("i", $User_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // User_id exists, proceed with event insertion
        $stmt->close();
        // Step 2: Insert the event into the Event table
        $sql = 'INSERT INTO Event (Eventname, Max_participants, start_date, end_date, description, status_event, User_id) 
                VALUES (?, ?, ?, ?, ?, ?, ?)';
        
        // Prepare the insert statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sissssi', $activity_name, $participants, $start_date, $end_date, $description, $status, $User_id);
        
        // Execute the query and return the result
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true;
        } else {
            error_log("Error inserting event: " . $stmt->error);
            $stmt->close();
            $conn->close();
            return false;
        }
    } else {
        // User_id does not exist, handle the error
        error_log("User with ID {$User_id} does not exist.");
        $stmt->close();
        $conn->close();
        return false;
    }
}


function getUserById(int $id): array|bool
{
    $conn = getConnection();
    $sql = 'select * from User where User_id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 0) {
        return false;
    }
    return $result->fetch_assoc();
}
