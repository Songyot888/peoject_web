<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
   randerView('login_get');

