<?php

function getConnection():mysqli
{
    $hostname = '45.64.187.212';
    $dbName = 'regacth_activity';
    $username = 'regacth_activity';
    $password = 'nYFc4aftNzpV4KyABVyG';
    $conn = new mysqli($hostname, $username, $password, $dbName , 3306);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

require_once DATABASE_DIR . '/User.php';
require_once DATABASE_DIR . '/Event.php';
require_once DATABASE_DIR . '/Event_img.php';
require_once DATABASE_DIR . '/jointable.php';
