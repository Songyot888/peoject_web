<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_id = $_POST['event_id'] ?? '';
    $events = getEventById($event_id);
    $userId = $_SESSION['User_id'] ?? '';
    $result = getUserJoinedEvents($userId);

    // Generate random code
    if (isset($_POST['checkin'])) {
        
        randerView('checkin_get', ['event_id' => $events]);
    } elseif (isset($_POST['ub'])) {
        if (isset($_POST['user_input'])) {
            $user_input = strtoupper(trim($_POST['user_input'])); 
            $random_code_session = strtoupper($_SESSION['random_code']); 

            // ตรวจสอบว่ารหัสตรงกันไหม
            if ($user_input !== $random_code_session) {
                echo "<script>alert('Invalid Code');</script>";
                randerView('checkin_get', ['event_id' => $events]);
                exit;
            } else {
                updateCheckIn($userId, $event_id, 1);
                unset($_SESSION['random_code']);
                randerView('profile_get');
            }
        }
    }
}
?>