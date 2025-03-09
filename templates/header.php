<?php
// ตรวจสอบว่า $data['events'] มีข้อมูลหรือไม่ และเป็น array

$search = isset($data['search']) ? $data['search'] : '';
$events = isset($data['events']) && is_array($data['events']) ? $data['events'] : [];
// รับค่าคำค้นหาจาก $data (ถ้ามี)
$startDate = isset($data['startDate']) ? $data['startDate'] : '';
$endDate = isset($data['endDate']) ? $data['endDate'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
/* General */
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    color: #333;
    padding-top: 70px;
    opacity: 0;
    animation: fadeIn 1s ease-in-out forwards;
}

@keyframes fadeIn {
    0% { opacity: 0; transform: translateY(-20px); }
    100% { opacity: 1; transform: translateY(0); }
}

/* Navbar */
.navbar {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
    background: linear-gradient(135deg, #007bff, #3399ff);
    box-shadow: 0 4px 10px rgba(0, 123, 255, 0.3);
    animation: navbarFadeIn 1s ease-in-out forwards;
}

@keyframes navbarFadeIn {
    0% { opacity: 0; transform: translateY(-30px); }
    100% { opacity: 1; transform: translateY(0); }
}

.navbar-brand {
    color: #ffffff !important;
    font-size: 1.5rem;
    font-weight: bold;
    letter-spacing: 1px;
}

.navbar-nav .nav-link {
    color: #fff !important;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.navbar-nav .nav-link:hover {
    color: #ffd700;
    transform: scale(1.05);
    text-shadow: 0 0 8px rgba(255, 215, 0, 0.5);
}

/* Search Form */
.d-flex.position-relative {
    gap: 10px; /* ทำให้ช่อง Search มีระยะห่างที่สวยขึ้น */
}

.form-control {
    background-color: #ffffff;
    border: 2px solid #007bff;
    color: #333;
    transition: all 0.3s ease;
    padding: 8px 12px;
}

.form-control:focus {
    border-color: #0056b3;
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
}

/* ปุ่ม Search */
.btn-outline-light {
    border: 2px solid #fff;
    color: #fff;
    font-weight: bold;
    padding: 8px 15px;
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
}

.btn-outline-light:hover {
    background: #0056b3;
    color: #fff;
    box-shadow: 0 0 12px rgba(0, 86, 179, 0.7);
    transform: scale(1.05);
}

/* ปุ่ม Logout */
.logout-btn {
    background-color: #dc3545;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    padding: 8px 15px;
    margin-left: 15px;
    transition: all 0.3s ease;
}

.logout-btn:hover {
    background-color: #c82333;
    box-shadow: 0 0 12px rgba(220, 53, 69, 0.7);
    transform: scale(1.05);
}

/* Responsive Navbar */
@media (max-width: 992px) {
    .navbar-nav {
        text-align: center;
    }

    .d-flex.position-relative {
        flex-direction: column;
        align-items: center;
        gap: 5px;
    }

    .logout-btn {
        width: 100%;
        margin-top: 10px;
    }
}

    </style>
</head>

<body>
    <header>
        <?php if (isset($_SESSION['timestamp'])) { ?>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/main">Activity Club</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/main">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/profile">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="/about">About</a></li>
                            <li class="nav-item"><a class="nav-link" href="/contact">Contact</a></li>
                        </ul>
                        <form class="d-flex position-relative" role="search" method="GET" action="/search">
                            <input class="form-control me-2" type="search" name="keyword" placeholder="ค้นหากิจกรรม">
                            <input class="form-control me-2" type="date" name="start_date" placeholder="Start Date">
                            <input class="form-control me-2" type="date" name="end_date" placeholder="End Date">
                            <button class="btn btn-outline-light" type="submit">ค้นหา</button>
                        </form>
                        <button class="btn logout-btn" onclick="window.location.href='/login'">ออกจากระบบ</button>
                    </div>
                </div>
            </nav>
        <?php } ?>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
