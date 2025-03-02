<?php


$conn = getConnection(); // เชื่อมต่อฐานข้อมูล

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $activity_name = $_POST['activity-name'] ?? '';
    $participants = intval($_POST['participants']) ?? 0; // แปลงให้เป็นตัวเลข
    $start_date = $_POST['start-date'] ?? '';
    $end_date = $_POST['end-date'] ?? '';
    $description = $_POST['description'] ?? '';

    // ตรวจสอบโฟลเดอร์อัปโหลด
    $target_dir = __DIR__ . "/../public/uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // ตรวจสอบและอัปโหลดรูปภาพ
    $image_name = "default.jpg";
    if (!empty($_FILES["image"]["name"]) && $_FILES["image"]["error"] == 0) {
        $image_name = time() . "_" . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    // บันทึกข้อมูลลงฐานข้อมูล
    $sql = "INSERT INTO Event (Eventname, Max_participants, start_date, end_date, description, image_url, status_event, User_id) 
            VALUES (?, ?, ?, ?, ?, ?, 'open', 1)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sissss", $activity_name, $participants, $start_date, $end_date, $description, $image_name);
        if ($stmt->execute()) {
            $new_id = $conn->insert_id;
            header("Location: /view_activity" . $new_id);
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request.";
}
?>
