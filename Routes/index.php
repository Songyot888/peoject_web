<?php

declare(strict_types=1);

// Constant values for this project
const INCLUDES_DIR = __DIR__ . '/includes';
const ROUTE_DIR = __DIR__ . '/routes';
const TEMPLATES_DIR = __DIR__ . '/templates';
const DATABASE_DIR = __DIR__ . '/databases';

session_start();

// Include router to index.php 
try {
    require_once INCLUDES_DIR . '/router.php';
    require_once INCLUDES_DIR . '/view.php';
    require_once INCLUDES_DIR . '/config.php';
} catch (Exception $e) {
    die('Error including files: ' . $e->getMessage());
}


// Call dispatch to handle requests
const PUBLIC_ROUTES = ['/', '/login', '/singup', '/homeactivity', '/updatepassword', '/search'];

if (in_array(strtolower($_SERVER['REQUEST_URI']), PUBLIC_ROUTES)) {
    dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    exit;
} elseif (isset($_SESSION['timestamp']) && time() - $_SESSION['timestamp'] < 30 * 60) {
    // 30 minutes.
    $unix_timestamp = time();
    $_SESSION['timestamp'] = $unix_timestamp;
    dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} else {
    unset($_SESSION['timestamp']);
    header('Location: /');
    exit;
}