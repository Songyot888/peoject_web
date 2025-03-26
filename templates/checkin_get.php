<?php
if (!isset($_SESSION['User_id'])) {
    header('Location: /login');
    exit;
}
        $random_code = strtoupper(substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6));
        $_SESSION['random_code'] = $random_code;
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
    <p>กิจกรรม: <?php echo $data['event_id']['Eventname']; ?></p>
    <p>กรุณากรอกตัวอักษรให้ตรงกับที่แสดง</p>
    <div class="checkin-code"><?php echo $random_code; ?></div>

    <form action="/checkin" method="POST">
        <!-- Pass the random code and event ID in hidden fields -->
        <input type="hidden" name="event_id" value="<?php echo $data['event_id']['Event_id']; ?>">
        <input type="text" name="user_input" class="checkin-input" required maxlength="6">
        <button name="ub" type="submit" class="checkin-button">ยืนยันเช็คอิน</button>
    </form>
</div>