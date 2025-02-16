<?php

function getConnection():mysqli
{
    $hostname = 'localhost';
    $dbName = 'demo';
    $username = 'demo';
    $password = 'demo';
    $conn = new mysqli($hostname, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

require_once DATABASE_DIR . '/students.php';
require_once DATABASE_DIR . '/courses.php';