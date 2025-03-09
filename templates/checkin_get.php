<?php

if (!isset($_SESSION['User_id'])) {
    header('Location: /login');
    exit;
}

$user_id = $_SESSION['User_id'];

if (!isset($_GET['event_id'])) {
    echo "<p>ไม่พบกิจกรรมที่ต้องการเช็คอิน</p>";
    exit;
}

$event_id = $_GET['event_id'];

$event = getEventById($event_id);

$random_code = strtoupper(substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6));
$_SESSION['checkin_code'] = $random_code;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // ตรวจสอบข้อมูลจากฟอร์ม
    if (isset($_POST['user_input'])) {
        $user_input = strtoupper(trim($_POST['user_input']));
        
        // ตรวจสอบรหัสเช็คอิน
        if (!isset($_SESSION['checkin_code']) || $user_input !== $_SESSION['checkin_code']) {
            $_SESSION['error'] = "รหัสเช็คอินไม่ถูกต้อง กรุณาลองใหม่!";
            header("Location: /checkin?event_id=$event_id");
            exit;
        }

        // อัปเดตสถานะเช็คอินในฐานข้อมูล
        $stmt = $pdo->prepare("UPDATE event_participants SET check_in = 1 WHERE event_id = ? AND user_id = ?");
        $stmt->execute([$event_id, $user_id]);

        unset($_SESSION['checkin_code']);

        $_SESSION['success'] = "เช็คอินสำเร็จ!";
        header('Location: /profile');
        exit;
    }
}
?>
<style>
    .checkin-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        text-align: center;
    }

    .checkin-code {
        font-size: 2rem;
        font-weight: bold;
        color: #007bff;
        background: #f0f0f0;
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 15px;
    }

    .checkin-input {
        font-size: 1.5rem;
        padding: 10px;
        border: 2px solid #007bff;
        border-radius: 5px;
        text-align: center;
    }

    .checkin-button {
        margin-top: 10px;
        padding: 10px 20px;
        font-size: 1.2rem;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .checkin-button:hover {
        background-color: #0056b3;
    }
</style>

<div class="checkin-container">
    <h2>เช็คอินเข้าร่วมกิจกรรม</h2>
    <p>กิจกรรม: <?php echo htmlspecialchars($event['Eventname']); ?></p>
    <p>กรุณากรอกตัวอักษรให้ตรงกับที่แสดง</p>
    <div class="checkin-code"><?php echo $random_code; ?></div>

    <form action="/checkin?event_id=<?php echo $event_id; ?>" method="POST">
        <input type="hidden" name="event_id" value="<?php echo $event_id; ?>">
        <input type="text" name="user_input" class="checkin-input" required maxlength="6">
        <button type="submit" class="checkin-button">ยืนยันเช็คอิน</button>
    </form>
</div>