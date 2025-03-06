<?php
$events = getAllEvents();
?>

<style>
    .container {
        width: 100%;
        max-width: 1200px;
        min-height: 100vh;
        padding: 20px;
        margin: 0 auto;
        background-color: #f4f7fa;
    }

    .add-event-button {
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #007bff, #00d4ff);
        color: white;
        width: 60px;
        height: 60px;
        font-size: 2em;
        font-weight: bold;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }

    .add-event-button:hover {
        background: linear-gradient(135deg, #0056b3, #00aaff);
        transform: scale(1.2);
        box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.3);
    }

    .profile {
        display: flex;
        align-items: center;
        background: white;
        padding: 20px;
        border-radius: 20px;
        box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.1);
        justify-content: space-between;
        margin-bottom: 30px;
        gap: 20px;
    }

    .profile img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 4px solid #007bff;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-name {
        min-width: 200px;
        text-align: center;
    }

    .profile-name h2 {
        font-size: 1.5em;
        margin: 10px 0;
    }

    .profile-name button {
        margin-top: 10px;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        background-color: #007bff;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
        font-size: 1em;
    }

    .profile-name button:hover {
        background-color: #0056b3;
    }

    .profile-info {
        display: flex;
        flex-grow: 1;
        justify-content: space-between;
        gap: 15px;
    }

    .info-section {
        background: #ffffff;
        padding: 15px;
        border-radius: 10px;
        flex: 1;
        text-align: center;
        box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.05);
    }

    .info-section h3 {
        margin-bottom: 10px;
        font-size: 1.2em;
    }

    .activity-left {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 20px;
    justify-items: center;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    justify-content: center;
    padding: 20px;
}

.activity-card {
    padding: 12px;
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
    box-sizing: border-box;
    position: relative;
    overflow: hidden;
}

.activity-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.2);
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
    padding: 10px;
    flex-grow: 1;
}

.activity-card-content h4 {
    font-size: 1em;
    margin: 10px 0;
    color: #333;
}

.activity-card-content p {
    color: #555;
    font-size: 0.9em;
}

.detail-button {
    background-color: #007bff;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
    font-size: 0.9em;
}

.detail-button:hover {
    background-color: #0056b3;
    transform: scale(1.1);
}

</style>

<section>
    <div class="container">
        <!-- ส่วนโปรไฟล์ -->
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

        <!-- ส่วนกิจกรรม -->
        <div class="activity-section">
            <h3>กิจกรรมที่สร้าง</h3>

            <!-- ปุ่มเพิ่มกิจกรรม -->
            <button class="add-event-button" onclick="window.location.href='/create_event.php';">
                <span class="plus-icon">➕</span>
            </button>

            <?php if (!empty($events)): ?>
                <div class="activity-left">
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
    </div>
</section>
