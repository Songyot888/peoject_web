<?php require_once 'header.php' ?>
<?php

if (!isset($_SESSION['User_id'])) {
    header('Location: /login');
    exit;
}


$user_id = $_SESSION['User_id'];
$user = getUserById($user_id);
$events = getUserEventsById($user_id);
// var_dump($events);
$joined_events = getUserJoinedEvents($user_id);
$img = getEventImages($events);
?>


<style>
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fa;
        color: #333;
        display: flex;
        flex-direction: column;
        /* จัดเรียงองค์ประกอบแนวตั้ง */
        align-items: center;
        min-height: 100vh;
        /* ให้ body สูงเต็มจอ */
        margin: 0;
    }

    .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        /* จัดกลางเนื้อหาทั้งหมด */
        overflow-y: auto;
        width: 100%;
        max-width: 1200px;
        /* min-height: 100vh; */
        padding: 30px;
        padding-top: 80px;
        /* เพิ่มพื้นที่ด้านบน */
        margin: 0 auto;
        background-color: #f4f7fa;
        border-radius: 15px;
        box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
        position: relative;
        /* กำหนดให้ .container เป็น relative */
    }

    .navbar {
        margin-bottom: 20px;
        /* เพิ่ม margin-bottom เพื่อให้ห่างจาก container */
    }

    .add-event-button {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #007bff, #00d4ff);
        color: white;
        width: 70px;
        height: 70px;
        font-size: 2.5em;
        font-weight: bold;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 3px 3px 15px rgba(0, 0, 0, 0.2);
        position: sticky;
        /* ปักหมุดอยู่ที่ตำแหน่ง fixed */
        bottom: 30px;
        /* กำหนดระยะห่างจากขอบล่าง */
        right: 30px;
        /* กำหนดระยะห่างจากขอบขวา */
        z-index: 1000;
        /* ปุ่มแสดงอยู่ด้านบนสุด */
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1), box-shadow 0.3s ease-in-out, background 0.3s ease-in-out;
    }

    /* เพิ่มการควบคุมค่า z-index ของ container */
    body,
    .container {
        position: relative;
        /* ควบคุมตำแหน่งขององค์ประกอบ */
    }


    /* การเคลื่อนที่ขึ้น-ลงแบบสมูธ */
    .add-event-button:hover {
        transform: translateY(-10px);
        /* ทำให้ปุ่มเคลื่อนที่ขึ้นเมื่อ hover */
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
        /* เพิ่มเงาให้ชัดขึ้นเมื่อ hover */
        background: linear-gradient(135deg, #0056b3, #00aaff);
        /* เปลี่ยนสีเมื่อ hover */
    }

    .add-event-button:active {
        transform: translateY(5px);
        /* เมื่อคลิก ปุ่มจะขยับลง */
        transition: transform 0.1s ease-out;
    }

    @keyframes smooth-up-down {
        0% {
            transform: translateY(0);
        }

        25% {
            transform: translateY(-15px);
        }

        50% {
            transform: translateY(0);
        }

        75% {
            transform: translateY(-10px);
        }

        100% {
            transform: translateY(0);
        }
    }

    .add-event-button {
        animation: smooth-up-down 2s ease-in-out infinite;
    }

    .profile {
        display: flex;
        align-items: center;
        background: white;
        padding: 25px;
        flex-shrink: 0;
        flex-grow: 1;
        border-radius: 20px;
        box-shadow: 0px 6px 20px rgba(0, 0, 0, 0.1);
        justify-content: space-between;
        margin-top: -5%;
        gap: 20px;
    }

    .profile img {
        width: 130px;
        height: 130px;
        border-radius: 50%;
        border: 4px solid #007bff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .profile img:hover {
        transform: scale(1.1);
    }

    .profile-name {
        min-width: 220px;
        text-align: center;
    }

    .profile-name h2 {
        font-size: 1.8em;
        margin: 10px 0;
        color: #333;
    }

    .profile-name button {
        margin-top: 15px;
        padding: 12px 30px;
        border: none;
        border-radius: 25px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 1.1em;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-name button:hover {
        background-color: #0056b3;
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
    }

    .profile-info {
        display: flex;
        flex-grow: 1;
        justify-content: space-between;
        gap: 20px;
    }

    .info-section {
        background: #ffffff;
        padding: 20px;
        border-radius: 10px;
        flex: 1;
        text-align: center;
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.05);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-section:hover {
        transform: translateY(-5px);
        box-shadow: 0px 6px 25px rgba(0, 0, 0, 0.2);
    }

    .info-section h3 {
        margin-bottom: 15px;
        font-size: 1.3em;
        color: #007bff;
    }

    .activity-left {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        justify-items: center;
        max-width: 1200px;
        margin: 0 auto;
        padding: 30px 0;
    }

    .activity-card {
        padding: 15px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 15px;
        text-align: center;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
        height: 380px;
        width: 280px;
        margin: 0 auto;
        position: relative;
        overflow: hidden;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .activity-card:hover {
        transform: translateY(-8px);
        box-shadow: 0px 12px 30px rgba(0, 0, 0, 0.15);
        border-color: #007bff;
    }

    .activity-card-img {
        height: 120px;
        background-size: cover;
        background-position: center;
        border-radius: 10px;
        border: 2px solid #ddd;
        transition: border 0.3s ease;
    }

    .activity-card-img:hover {
        border-color: #007bff;
    }

    .activity-card-content {
        padding: 15px;
        flex-grow: 1;
    }

    .activity-card-content h4 {
        font-size: 1.2em;
        margin: 12px 0;
        color: #333;
    }

    .activity-card-content p {
        color: #555;
        font-size: 1em;
    }

    .detail-button {
        background-color: #007bff;
        color: white;
        padding: 12px 25px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
        font-size: 1em;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .detail-button:hover {
        background-color: #0056b3;
        transform: scale(1.1);
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
    }

    .menu-button {
        position: relative;
        z-index: 2000;
        /* เพิ่ม z-index ให้สูงกว่า */
    }

    .back-button {
        padding: 12px 25px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 1.1em;
        margin-top: 20px;
        /* ใส่ช่องว่างด้านบน */
    }

    .back-button:hover {
        background-color: #0056b3;
    }

    .checkin-btn {
        display: inline-block;
        padding: 8px 16px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 10px;
        font-weight: bold;
        transition: background 0.3s;
    }

    .checkin-btn:hover {
        background-color: #218838;
    }

    .toggle-button {
        margin-top: 5%;
        padding: 5px 15px;
        border: none;
        border-radius: 8px;
        font-size: 1em;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .toggle-button.active {
        background-color: #dc3545;
        /* สีแดง */
        color: white;
    }

    .toggle-button.inactive {
        background-color: #28a745;
        /* สีเขียว */
        color: white;
    }

    .toggle-button:hover {
        transform: scale(1.08);
        box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
    }

    .toggle-button:active {
        transform: scale(0.96);
    }
</style>
<section>
    <div class="container">
        <!-- ส่วนโปรไฟล์ -->
        <div class="profile">
            <img src="<?php echo !empty($user['img_url']) ? $user['img_url'] : 'default-image.jpg'; ?>">
            <div class="profile-name">
                <h2><?php echo !empty($user['Name']) ? $user['Name'] : 'No Name available'; ?></h2>
                <p>ตำแหน่ง: ผู้ดูแลระบบ</p>
                <p>เพศ: <?php echo !empty($user['gender']) ? $user['gender'] : 'No gender available'; ?> </p>

                <button onclick="window.location.href='/profile_edit'">แก้ไขโปรไฟล์</button>
            </div>
            <div class="profile-info">
                <div class="info-section">
                    <h3>📧 <br> Email</h3>
                    <p><?php echo !empty($user['Email']) ? $user['Email'] : 'No Email available'; ?></p>
                </div>
                <div class="info-section">
                    <h3>📞<br> Phone</h3>
                    <p>
                        <?php echo !empty($user['phone']) ? $user['phone'] : 'No phone number available'; ?>
                    </p>
                </div>
                <div class="info-section">
                    <h3>🏠 Address</h3>
                    <p>
                        <?php echo !empty($user['Addss']) ? $user['Addss'] : 'No address available'; ?>
                    </p>
                </div>
                <div class="info-section">
                    <h3>🎂 Birthday</h3>
                    <p>
                        <?php echo !empty($user['birthday']) ? $user['birthday'] : 'No birthday available'; ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- ส่วนกิจกรรม -->
        <div class="activity-section">
            <h3 style="margin-top: 40px;">กิจกรรมที่สร้าง</h3>

            <!-- ปุ่มเพิ่มกิจกรรม -->

            <?php if (!empty($events)): ?>
                <div class="activity-left">
                    <?php foreach ($events as $event): ?>
                        <div class="activity-card">
                            <div class="activity-card-img" style="background-image: url('<?php echo $event['image_url'] ?>');"></div>
                            <div class="activity-card-content">
                                <h4><?php echo htmlspecialchars($event['Eventname']); ?></h4>
                                <p><?php echo htmlspecialchars($event['description']); ?></p>
                                <form action="/profile" method="post">
                                    <input type="hidden" name="event_id" value="<?= $event['Event_id']; ?>';">
                                    <button type="submit" name="de" class="detail-button">Detail</button>
                                </form>


                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>ไม่มีข้อมูลกิจกรรม</p>
            <?php endif; ?>
        </div>
        <div class="activity-right">
            <h3>⚡ กิจกรรมที่เข้าร่วม</h3>
            <?php if (!empty($joined_events)): ?>
                <div class="activity-left">
                    <?php foreach ($joined_events as $joined): ?>
                        <div class="activity-card">
                            <div class="activity-card-img" style="background-image: url('<?php echo $joined['image_url']; ?>');"></div>
                            <div class="activity-card-content">
                                <h4><?php echo $joined['Eventname']; ?></h4>
                                <p><?php echo $joined['description']; ?></p>
                                <p style="gap: 8px;">
                                    <strong>สถานะ:</strong>
                                    <span style="width: 12px; height: 12px; border-radius: 50%; display: inline-block; background-color:
                            <?php
                            if ($joined['status'] === 'approved') {
                                echo 'green';
                            } elseif ($joined['status'] === 'denied') {
                                echo 'red';
                            } elseif ($joined['status'] === 'pending') {
                                echo 'yellow';
                            } else {
                                echo 'gray';
                            }
                            ?>">
                                    </span>
                                </p>
                                <?php if ($joined['status'] === 'approved'): ?>
                                    <?php if ($joined['check_in'] == 1): ?>
                                        <p>เช็คอินแล้ว</p>
                                    <?php else: ?>
                                        <form action="/checkin" method="POST">
                                            <input type="hidden" name="event_id" value="<?= $joined['Event_id']; ?>">
                                            <button name="checkin" type="submit" class="checkin-btn">เช็คอิน</button>
                                        </form>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>คุณยังไม่ได้เข้าร่วมกิจกรรมใด ๆ</p>
            <?php endif; ?>

            <!-- ปุ่มกลับไปหน้า Main -->
            <button onclick="window.location.href='/main'" class="back-button">กลับไปหน้าแรก</button>
        </div>

</section>
