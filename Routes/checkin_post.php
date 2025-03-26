<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $event_id = $_POST['event_id'] ?? '';
    $userId = $_SESSION['User_id'] ?? '';
    $image = $_FILES['checkin_image'] ?? null;
    $events = getEventById($event_id);
    
    // Generate random code
    if (isset($_POST['checkin'])) {
        
        randerView('checkin_get', ['event_id' => $events]);

        
    } elseif(isset($_POST['upload'])) {
        error_log("Debug userId: " . $userId);
        error_log("Debug eventId: " . $event_id); 
        
            if ($image) {
                if (updateCheckinImage($userId, $image)) {
                    echo "✅ Image uploaded and updated in database!";
                } else {
                    echo "❌ Failed to update check-in image.";
                }
            } else {
                echo "⚠️ No image uploaded or invalid file.";
            }
        
        randerView('profile_get');
        
    }
    

    
}
?>