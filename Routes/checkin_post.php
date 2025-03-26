<?php
<<<<<<< HEAD
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
=======
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['checkin_image'])) {
    $event_id = $_POST['event_id'];
    $image = $_FILES['checkin_image'];

    // การตรวจสอบภาพ
    $image_name = basename($image['name']);
    $image_tmp = $image['tmp_name'];
    $image_size = $image['size'];
    $image_error = $image['error'];

    if ($image_error === UPLOAD_ERR_OK) {
        $target_dir = "uploads/";
        $target_file = $target_dir . $image_name;
        if (move_uploaded_file($image_tmp, $target_file)) {
            echo "อัพโหลดภาพสำเร็จ!";
            // บันทึกข้อมูลเช็คอินในฐานข้อมูล
            // updateCheckinStatus($event_id, $user_id, $target_file);
        } else {
            echo "เกิดข้อผิดพลาดในการอัพโหลดภาพ";
>>>>>>> 1ef57e9a19da8664ed1a0efcf543328bbb52a88c
        }
    }
}
?>