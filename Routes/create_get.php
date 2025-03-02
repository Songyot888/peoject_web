<?php
 
    $User_id = $_SESSION['User_id'];
    randerView('create_get', ['User_id' => $User_id]);