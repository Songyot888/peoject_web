<?php

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$message = $_POST['message'] ?? '';

if (empty($name) || empty($email) || empty($message)) {
     badRequest("All fields are required");
 }
 
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     badRequest("Email field is invalid");
 }
// Insert into database
getConnection();

 renderView('thank_get',["name"=>$name, "email"=> $email, "message"=>$message]);