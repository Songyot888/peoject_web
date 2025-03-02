<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activity_name = $_POST['activity-name'];
    $participants = ($_POST['participants']) ?? 0;
    $start_date = $_POST['start-date'];
    $end_date = $_POST['end-date'] ;
    $description = $_POST['description'] ;
    $status = $_POST['status'] ; 
    $User_id = $_POST['User_id']; 

    if (insertEvent($activity_name, $participants, $start_date, $end_date, $description, $status, $User_id)) {
        header("Location: /view_activity");
        exit;
    } else {
        
        echo "Insert event failed.";
    }
} else {
    echo "Invalid request.";
}
?>