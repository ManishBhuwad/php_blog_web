<?php

declare(strict_types = 1);


function get_username(string $username, object $pdo){
    $query = "SELECT username FROM users WHERE username=:username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}



function get_email(object $pdo, string $email){

    $query = "SELECT email FROM users WHERE email=:email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam("email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;

}


function set_user(object $pdo, string $username, string $email, string $pwd){

    $query = "INSERT INTO users(username, email, pwd) VALUES(:username, :email, :pwd);";

    $options =[
        "cost" => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT,$options);

    $stmt= $pdo->prepare($query);
    $stmt->bindParam("username", $username);
    $stmt->bindParam("email", $email);
    $stmt->bindParam("pwd", $hashedPwd);

    $stmt->execute();

}
