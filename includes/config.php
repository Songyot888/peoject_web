<?php

function getConnection():mysqli
{
    $hostname = 'localhost';
    $dbName = 'activity';
    $username = 'user';
    $password = 'user';
    $conn = new mysqli($hostname, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

require_once DATABASE_DIR . '/user.php';
require_once DATABASE_DIR . '/event.php';
require_once DATABASE_DIR . '/event_img.php';
require_once DATABASE_DIR . '/attendee_event.php';
require_once DATABASE_DIR . '/event_attendee_link.php';