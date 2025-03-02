<?php

function getConnection():mysqli
{
    $hostname = '45.64.187.212';
    $dbName = 'regacth_activity';
    $username = 'regacth_activity';
    $password = 'a4gBE@FMDsdKTF5';
    $conn = new mysqli($hostname, $username, $password, $dbName , 3306);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

require_once DATABASE_DIR . '/user.php';
require_once DATABASE_DIR . '/event.php';
require_once DATABASE_DIR . '/event_img.php';
require_once DATABASE_DIR . '/jointable.php';