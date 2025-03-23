<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: white;
            color: #333;
            padding-top: 80px;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .navbar {
            background: linear-gradient(135deg, #00c6ff, #0072ff);
            backdrop-filter: blur(10px);
            box-shadow: 0px 4px 10px rgba(0, 191, 255, 0.2);
        }

        .navbar-brand {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: white !important;
            text-transform: uppercase;
            font-weight: bold;
        }

        .nav-link {
            color: white !important;
            font-size: 1.1rem;
        }

        .nav-link:hover {
            color: #ffd700 !important;
        }

        .btn-search {
            background-color: #00d1ff;
            color: white;
            border-radius: 20px;
            padding: 8px 16px;
            font-weight: bold;
            transition: 0.3s;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-search:hover {
            background-color: white;
            color: #00d1ff;
            box-shadow: 0 5px 15px rgba(0, 191, 255, 0.4);
        }

        .logout-btn {
            background: linear-gradient(135deg, #ff3b3b, #c82333);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: linear-gradient(135deg, #c82333, #9a1c1c);
        }

        .profile-link {
            color: #00d1ff;
            font-weight: bold;
            text-decoration: none;
            padding-left: 10px;
        }

        .profile-link:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        .navbar-toggler-icon {
            background-color: white;
            transition: transform 0.3s ease-in-out;
        }

        .navbar-toggler-icon.collapsed {
            transform: rotate(90deg);
        }

        .navbar-collapse {
            justify-content: flex-end;
        }

        /* Remove responsive styles */
        .navbar-nav {
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-item .profile-link {
            display: inline-block;
            padding: 0 10px;
        }

        .navbar-toggler {
            display: block;
        }
    </style>
</head>
<body>
<header>
<?php if (isset($_SESSION['timestamp'])) { ?>
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Activity Club</a>  
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link active" href="#">Home</a></li>
        <a href="/profile" class="profile-link">Profile</a> <!-- Show Profile link in all screen sizes -->
        <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
      </ul>
      <form class="d-flex" method="GET" action="/search">
        <input class="form-control me-2" type="search" name="keyword" placeholder="Search events" required>
        <button class="btn btn-search" type="submit">Search</button>
      </form>
      <button class="btn logout-btn ms-3" onclick="window.location.href='/login'">Logout</button>
    </div>
  </div>
</nav>
<?php } ?>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
