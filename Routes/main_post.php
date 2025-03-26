<?php
$events = getAllEvents();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST['eid'] ?? '';
    $action = $_POST['action'] ?? '';
    

    if (!empty($event_id) && !empty($action)) {
        $result = getEventById($event_id);
        

        if ($result) { 
            if ($action === 'sing') {
                randerView('register_at_get', ['event_id' => $result]); 
                
            } elseif ($action === 'view') {
                randerView('view_activity_get', ['event_id' => $result]); 
            }
        } else {
            echo "ไม่พบข้อมูลกิจกรรม";
        }
    } else {
        echo "ข้อมูลไม่ครบถ้วน";
    }
}
?>
