<?php
    require_once "header.php";
    $email = $_POST['email'];
    
    $result = auth::construct_with_one_arg(&$email);
    //$result = $user->check_username($user->email);
    echo $result;
