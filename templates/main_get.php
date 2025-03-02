<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Activity Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            /* ทำให้หน้าเว็บมีความสูงไม่น้อยกว่าขนาดของ viewport */
        }

        .container {
            width: 100%;
            padding-bottom: 50px;
            /* เพิ่มระยะห่างด้านล่าง */
        }

        .activity-container {
            margin-top: 20px;

            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            justify-content: center;
        }

        .activity-card {
            width: 300px;
            height: 400px;
            background-color: #ccc;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            border-radius: 10px;
            text-align: center;
            padding: 20px;
        }

        .activity-card {
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            align-items: center;
            height: 400px;
            transition: 0.3s;
        }

        .activity-card .content {
            margin-top: 10px;
            text-align: center;
            width: 100%;
            position: relative;
        }

        .activity-card .content button {
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            display: block;
            width: 100%;
            margin-top: 5px;
        }

        .activity-card:hover .content button {
            opacity: 1;
        }


        .activity-card img {
            width: 100%;
            height: 180px;
            border-radius: 10px;
            object-fit: cover;
            margin-top: 10px;
        }

        .activity-card .content {
            margin-top: 10px;
            text-align: center;
        }

        .large-activity-card {
            width: calc(100% + 200px);
            /* ขยายข้างละ 100px */
            max-width: 1700px;
            /* ป้องกันการขยายเกินขนาดหน้าจอ */
            height: 600px;
            background-color: #bbb;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            text-align: center;
            margin-left: -100px;
            /* ขยับไปทางซ้าย 100px เพื่อให้สมดุล */
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Activity Club</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="ค้นหา..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">ค้นหา</button>
                </form>
            </div>
        </div>
    </nav>
    <h2 class="text1-dark" style="margin-top: 20px; margin-left: 30px;">Activity Club</h2>
    <div class="container">
        <div class="container d-flex justify-content-start">
            <div class="large-activity-card">
                <h3>Main Activity</h3>
            </div>
        </div>
        <div class="activity-container">

            <div class="activity-card">
                <span>+</span>
            </div>
            <div class="activity-card">
                <div class="content">
                    <p>Activity 1</p>
                </div>
                <img src="https://via.placeholder.com/300x180" alt="Activity 1">
                <div class="content">
                    <button class="btn btn-primary">View</button>
                    <button class="btn btn-success">Sign</button>
                </div>
            </div>
            <div class="activity-card">
                <div class="content">
                    <p>Activity 2</p>
                </div>
                <img src="https://via.placeholder.com/300x180" alt="Activity 2">
                <div class="content">
                    <button class="btn btn-primary">View</button>
                    <button class="btn btn-success">Sign</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>