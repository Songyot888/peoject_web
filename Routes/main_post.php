<?php
$events = getAllEvents();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST['eid'] ?? '';
    // var_dump($event_id);
    $result = getEventById($event_id);

    if (isset($_POST['sing'])) {
        randerView('register_at_get', ['event_id' => $result]);
        
    }elseif (isset($_POST['view'])) {

        randerView('view_activity_get', ['event_id' => $result]);
    }

}

?>