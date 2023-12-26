<?php
    session_start();
    if(isset($_SESSION["user_id"])){

        require_once "includes/dbh.php";

        $query = "SELECT * FROM posts;";
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        $result=   $stmt->fetchAll(PDO::FETCH_ASSOC);

    //    echo $_GET["id"]

        $userid = $_SESSION["user_id"];



    }else{
        header("Location: index.php");
        die();
    }
    


?>