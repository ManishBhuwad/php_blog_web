<?php


$host = "localhost:3307";
$dbname = "blogdatabase";
$dbusername="root";
$dbpassword = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname",$dbusername,$dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $th) {
   echo 'connection failed'.$th->getMessage();
}

