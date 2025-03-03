<?php
$events = getAllEvents();
?>
    <style>
        body {
            background: #87CEFA; /* สีฟ้าสดใส */
            font-family: Arial, sans-serif;
            color: #333; /* เปลี่ยนสีข้อความให้มองเห็นชัดขึ้น */
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9); /* สีขาวโปร่งแสงเล็กน้อย */
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        .profile {
            display: flex;
            align-items: center;
            background: #f8f9fa; /* สีขาวอ่อน */
            padding: 20px;
            border-radius: 20px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
            justify-content: space-between;
            gap: 20px;
        }
        .profile img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid #007bff; /* ขอบสีน้ำเงิน */
        }
        .profile-name {
            min-width: 200px;
            text-align: center;
        }
        .profile-info {
            display: flex;
            flex-grow: 1;
            justify-content: space-between;
            gap: 10px;
        }
        .info-section {
            background: #ffffff;
            padding: 15px;
            border-radius: 10px;
            flex: 1;
            min-width: 120px;
            text-align: center;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .activity-section {
            margin-top: 20px;
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            gap: 10px;
        }
        .activity-left, .activity-right {
            flex: 1;
            padding: 15px;
            border-radius: 10px;
            background: white;
            text-align: center;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .profile-name button {
            margin-top: 10px;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .profile-name button:hover {
            background-color: #0056b3;
        }

        .activity-section {
    margin: 20px;
}

.activity-container {
    display: flex;               /* ใช้ Flexbox เพื่อจัดเรียงบล็อกกิจกรรม */
    flex-wrap: wrap;             /* ให้แต่ละบล็อกไหลไปแถวถัดไปเมื่อพื้นที่ไม่พอ */
    gap: 20px;                   /* ระยะห่างระหว่างบล็อก */
}

.activity-card {
    width: 250px;                /* ความกว้างของแต่ละบล็อก */
    padding: 15px;
    background-color: #f0f0f0;
    border: 1px solid #ccc;
    border-radius: 8px;
    text-align: center;
    display: flex;
    flex-direction: column;      /* ให้เนื้อหาภายในบล็อกจัดเรียงในแนวตั้ง */
}

.activity-card-img {
    height: 150px;               /* ความสูงของภาพ */
    background-size: cover;
    background-position: center;
    border-radius: 8px;
}

.activity-card-content {
    padding: 10px;
}

.activity-card-content h4 {
    font-size: 1.2em;
    margin: 10px 0;
}

.activity-card-content p {
    color: #555;
    font-size: 0.9em;
}

.detail-button {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-top: 10px;
}

.detail-button:hover {
    background-color: #45a049;
}
    </style>
<section>
<div class="container">
        <div class="profile">
            <img src="profile.png" alt="">
            <div class="profile-name">
                <h2>Name Admin</h2>
                <p>ตำแหน่ง: ผู้ดูแลระบบ</p>
                <button>แก้ไขโปรไฟล์</button>
            </div>
            <div class="profile-info">
                <div class="info-section">
                    <h3>📧 Email</h3>
                    <p>admin@example.com</p>
                </div>
                <div class="info-section">
                    <h3>📞 Phone</h3>
                    <p>012-345-6789</p>
                </div>
                <div class="info-section">
                    <h3>🏠 Address</h3>
                    <p>123 ถนนหลัก เมืองไทย</p>
                </div>
                <div class="info-section">
                    <h3>🎂 Birthday</h3>
                    <p>1 มกราคม 1990</p>
                </div>
            </div>
        </div>

        <div class="activity-section">
        <h3>กิจกรรมที่สร้าง</h3>
        <?php if (!empty($events)): ?>
            <div class="activity-container">
                <?php foreach ($events as $event): ?>
                    <div class="activity-card">
                        <div class="activity-card-img" style="background-image: url('path-to-image.jpg');"></div>
                        <div class="activity-card-content">
                            <h4><?php echo htmlspecialchars($event['Eventname']); ?></h4>
                            <p>"<?php echo htmlspecialchars($event['description']); ?>"</p>
                            <button class="detail-button" onclick="window.location.href='/detail?Event_id=<?php echo $event['Event_id']; ?>';">Detail</button>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p>ไม่มีข้อมูลกิจกรรม</p>
        <?php endif; ?>
    </div>
   


    <div class="activity-right">
        <h3>⚡ Actions</h3>
    </div>
</div>
</section>
    