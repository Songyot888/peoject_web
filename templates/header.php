<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <!-- Custom Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .navbar {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .logout-btn {
            margin-left: 10px;
        }
    </style>
</head>

<body>
<header>
<?php
        if (isset($_SESSION['timestamp'])) {
        ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          ☰
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="/profile">Profile</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <!-- Search Form -->
      <form class="d-flex position-relative" role="search" method="GET" action="/search">
        <input class="form-control me-2" type="search" name="keyword" placeholder="Search events" required>
        <button class="btn btn-outline-success" type="submit">Search</button>
        
        <!-- Search Results (Show if exists) -->
        <div class="search-results p-2">
          <?php
          if (isset($data['result'])) {
              while ($row = $data['result']->fetch_object()) {
                  echo "<div>" . htmlspecialchars($row->Eventname) . "</div>";
              }
          }
          ?>
        </div>
      </form>
      <button class="btn btn-danger logout-btn" onclick="window.location.href='/login'">Logout</button> 
</nav>
<?php
        }
    ?>
</header>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rbsA2VBKQGpUFnj46y1c9iUqD+OMwE8lV3qQWth/1lD6D9tGtJ+KjU5Wq5qF3hG5" crossorigin="anonymous"></script>
<script>
  // Show search results when available
  document.addEventListener("DOMContentLoaded", function() {
      let searchResults = document.querySelector(".search-results");
      if (searchResults.innerHTML.trim() !== "") {
          searchResults.style.display = "block";
      }
  });
</script>