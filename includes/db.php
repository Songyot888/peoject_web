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

require_once DATABASE_DIR . '/attendee.php';
require_once DATABASE_DIR . '/event_attendee_link.php';
require_once DATABASE_DIR . '/event_img.php';
require_once DATABASE_DIR . '/event.php';
require_once DATABASE_DIR . '/user.php';