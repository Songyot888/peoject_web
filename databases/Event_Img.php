<?php
function insertEventImages($event_id, $images) {
    $conn = getConnection();
    $uploadDir = 'uploads/event/';
    
    if (isset($images['tmp_name'])) {
        foreach ($images['tmp_name'] as $key => $tmp_name) {
            // เพิ่มรูปภาพถัดไปหลังจากรูปแรก
            if ($key > 0) {
                $imagePath = $uploadDir . basename($images['name'][$key]);
                if (move_uploaded_file($tmp_name, $imagePath)) {
                    // เพิ่มรูปภาพเข้าไปใน Event_Img โดยอ้างอิงกับ event_id
                    $sql = 'INSERT INTO Event_Img (Event_id, url) VALUES (?, ?)';
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('is', $event_id, $imagePath);
                    $stmt->execute();
                } else {
                    error_log("Image upload failed for file: " . $images['name'][$key]);
                }
            }
        }
    }

    $conn->close();
}

function getEventImages($eventId) {
    $conn = getConnection();
    $imagesQuery = "SELECT url FROM Event_Img WHERE Event_id = ?";
    $stmt = $conn->prepare($imagesQuery);
    
    // ผูกพารามิเตอร์
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    
    // รับผลลัพธ์
    $result = $stmt->get_result();
    $images = [];
    
    // ดึงข้อมูลรูปภาพจากฐานข้อมูล
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['url']; // เก็บเส้นทางของรูปภาพ
    }
    
    // คืนค่าผลลัพธ์
    return $images;
}