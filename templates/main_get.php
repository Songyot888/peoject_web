<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Activity Club</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background: linear-gradient(135deg, #ff9a9e, #fad0c4);
        }
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
        }
        .navbar-brand, .nav-link {
            color: white !important;
        }
        .main-container {
            padding-top: 80px;
            text-align: center;
        }
        .card {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            transition: transform 0.3s ease;
        }
        .card img {
            border-radius: 10px;
            height: 180px;
            object-fit: cover;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .add-activity {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .add-activity:hover {
            background-color: #218838;
        }
        .modal-content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Activity Club</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <form class="d-flex me-auto" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                            Menu
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Home</a></li>
                            <li><a class="dropdown-item" href="#">Activities</a></li>
                            <li><a class="dropdown-item" href="#">Contact</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">User Name</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container main-container">
        <h1 class="mb-4">Activity Club</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100">
                    <img src="activity1.jpg" class="card-img-top" alt="Activity 1">
                    <div class="card-body text-center">
                        <button class="btn btn-primary mb-2">+</button>
                        <div class="d-flex justify-content-between">
                            <button class="btn btn-success">View</button>
                            <button class="btn btn-success">Sign</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Activity Button -->
    <button class="add-activity" data-bs-toggle="modal" data-bs-target="#addActivityModal">+</button>

    <!-- Add Activity Modal -->
    <div class="modal fade" id="addActivityModal" tabindex="-1" aria-labelledby="addActivityModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addActivityModalLabel">Add New Activity</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="activityName" class="form-label">Activity Name</label>
                            <input type="text" class="form-control" id="activityName" required>
                        </div>
                        <div class="mb-3">
                            <label for="activityImage" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="activityImage">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Activity</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
