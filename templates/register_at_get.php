
    <style>
    body {
        background: linear-gradient(135deg, #ff9a9e, #fad0c4);
        color: #333;
        font-family: Arial, sans-serif;
    }

    section {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 80px 20px 20px;
    }

    .regis-at-container {
        background: rgba(255, 255, 255, 0.9);
        padding: 40px;
        border-radius: 15px;
        width: 80%;
        max-width: 1000px;
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    h1 {
        font-size: 3rem;
        margin-bottom: 30px;
        color: #ff6f61;
    }

    .activity-container {
        display: flex;
        justify-content: center;
        gap: 30px;
        flex-wrap: wrap;
    }

    .activity-image img {
        width: 280px;
        height: 280px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 20px;
        border: 3px solid #ff6f61;
    }

    .activity-details {
        color: #333;
        text-align: left;
        flex: 1;
        max-width: 500px;
    }

    .activity-description {
        font-size: 1.4rem;
        margin-bottom: 20px;
    }

    .status-container {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .status-text {
        font-size: 1.2rem;
        margin: 0;
    }

    .status-dot {
        width: 18px;
        height: 18px;
        border-radius: 50%;
        display: inline-block;
    }

    .status-dot.green {
        background-color: #28a745;
    }

    .register-button, .back-button {
        padding: 15px 25px;
        font-size: 1.2rem;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: 0.3s ease;
    }

    .register-button {
        background-color: #ff6f61;
        color: white;
    }

    .register-button:hover {
        background-color: #e35d56;
    }

    .back-button {
        background-color: #6c757d;
        color: white;
    }

    .back-button:hover {
        background-color: #5a6268;
    }

    @media (max-width: 768px) {
        .activity-container {
            flex-direction: column;
            padding: 20px;
        }

        .activity-image img {
            width: 220px;
            height: 220px;
        }

        .register-button, .back-button {
            width: 100%;
        }
    }
</style>

<?php
// ตรวจสอบว่าได้ข้อมูลกิจกรรมจากฟังก์ชัน randerView หรือไม่
if (isset($data['event'])) {
    $event = $data['event'];  // ดึงข้อมูลกิจกรรมจากอาร์เรย์
    // แสดงเฉพาะคำอธิบายของกิจกรรม
    echo "<section>";
    echo "<div class='regis-at-container'>";
    echo "<h1>Activity</h1>";
    echo "<div class='activity-container'>";
    echo "<div class='activity-image'>";
    echo "<img src='activity-placeholder.jpg' alt='Activity Image'>";
    echo "</div>";
    echo "<div class='activity-details'>";
    echo "<p class='activity-description'>";
    // แสดงคำอธิบายกิจกรรมจากฐานข้อมูล
    echo nl2br(htmlspecialchars($event['description']));  // แสดงคำอธิบาย
    echo "</p>";
    echo "<div class='status-container'>";
    echo "<p class='status-text'>Participants: 0/50</p>";
    echo "<div class='status-dot green'></div>";
    echo "</div>";

    // ฟอร์มสำหรับลงทะเบียนเข้าร่วมกิจกรรม
    echo "<form action='/register_event' method='POST'>";
    echo "<input type='hidden' name='user_id' value='" . $_SESSION['User_id'] . "'>";  // ใช้ user_id จาก session
    echo "<input type='hidden' name='event_id' value='" . $event['event_id'] . "'>";  // ใช้ event_id ที่ได้จากฐานข้อมูล
    echo "<button type='submit' class='register-button'>Register</button>";
    echo "</form>";

    echo "<button class='back-button' onclick='window.history.back()'>Back</button>";
    echo "</div>";
    echo "</div>";
    echo "</div>";
    echo "</section>";
} else {
    echo "<p>ไม่พบข้อมูลกิจกรรม.</p>";
}
?>
