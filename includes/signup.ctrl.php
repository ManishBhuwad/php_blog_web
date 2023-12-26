<?php

declare(strict_types=1);


function is_inputs_empty(string $username, string $email, string $pwd){
    if(empty($username) || empty($email) || empty($pwd)){
        return true;
    }else{
        false;
    }
}

function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function is_username_taken(string $username, object $pdo){
    if(get_username($username, $pdo)){
        return true;
    }else{
        return false;
    }
}

function is_email_registered(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }else{
        return false;
    }
}


function create_user(object $pdo, string $username, string $email, string $pwd){
    set_user($pdo, $username, $email, $pwd);
}
