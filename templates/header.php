<?php

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards;
            z-index: 0;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-30px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #007bff;
            opacity: 0;
            animation: navbarFadeIn 1s ease-in-out forwards;
        }

        @keyframes navbarFadeIn {
            0% {
                opacity: 0;
                transform: translateY(-50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .navbar-brand {
            color: #fff !important;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-size: 1rem;
            margin-left: 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #ffd700;
        }

        .navbar-toggler-icon {
            background-color: #fff;
        }
        

        .search-results {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            border: 1px solid #ddd;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
        }

        .search-results div {
            padding: 8px;
            cursor: pointer;
        }

        .search-results div:hover {
            background-color: #f1f1f1;
        }

        .logout-btn {
            margin-left: 10px;
            background-color: #dc3545;
            color: white;
            border: none;
            font-weight: bold;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <header>
        <?php
        if (isset($_SESSION['timestamp'])) {
        ?>
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Activity Club</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">


                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    ☰
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/profile">Profile</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                        <form class="d-flex position-relative" role="search" method="GET" action="/search">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search events" value="<?php echo htmlspecialchars($search); ?>">
                            <input class="form-control me-2" type="date" name="startDate" placeholder="Start Date From" value="<?php echo htmlspecialchars($startDate); ?>">
                            <input class="form-control me-2" type="date" name="endDate" placeholder="Start Date To" value="<?php echo htmlspecialchars($startDate); ?>">

                            <button class="btn btn-outline-light" type="submit">Search</button>
                            <div class="search-results p-2" id="search-results"></div>
                        </form>
                        




                        <button class="btn logout-btn" onclick="window.location.href='/login'">Logout</button>
                    </div>
                </div>
            </nav>
        <?php
        }
        ?>
    </header>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rbsA2VBKQGpUFnj46y1c9iUqD+OMwE8lV3qQWth/1lD6D9tGtJ+KjU5Wq5qF3hG5" crossorigin="anonymous"></script>
    <script>
        function searchEvents() {
            const keyword = document.querySelector("input[name='keyword']").value;
            const startDateStart = document.querySelector("input[name='start_date_start']").value;
            const startDateEnd = document.querySelector("input[name='start_date_end']").value;
            const searchResults = document.getElementById("search-results");

            // ตรวจสอบว่าผู้ใช้พิมพ์คำค้นหาหรือไม่
            if (keyword.trim() === "") {
                searchResults.style.display = "none";
                return;
            }

            const xhr = new XMLHttpRequest();
            xhr.open("GET", `/search?keyword=${keyword}&start_date_start=${startDateStart}&start_date_end=${startDateEnd}`, true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    // ตรวจสอบว่ามีผลลัพธ์หรือไม่
                    if (xhr.responseText.trim() === "") {
                        searchResults.innerHTML = "No events found.";
                    } else {
                        searchResults.innerHTML = xhr.responseText;
                    }
                    searchResults.style.display = "block";
                }
            };

            xhr.send();
        }




        // Hide search results when clicking outside
        document.addEventListener("click", function(event) {
            const searchResults = document.getElementById("search-results");
            if (!searchResults.contains(event.target) && event.target !== document.querySelector("input[name='keyword']")) {
                searchResults.style.display = "none";
            }
        });
    </script>
