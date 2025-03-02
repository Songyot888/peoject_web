<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
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
    </style>
</head>
<body>

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
            <div class="activity-left">
                <h3>👥 Activity</h3>
                <p>สถานะปัจจุบัน: <span style="color: green;">Active</span></p>
            </div>
            <div class="activity-right">
                <h3>⚡ Actions</h3>
            </div>
        </div>
    </div>

</body>
</html>
