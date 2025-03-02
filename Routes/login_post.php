<?php
    if (isset($_SESSION['email']) && isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['confirm_password'])) {
        $email = $_SESSION['email'];
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];

        if (register($email , $username , $password)) {
            
        }else{
            
        }
    }