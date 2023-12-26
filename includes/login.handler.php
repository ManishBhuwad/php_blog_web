<?php


if($_SERVER["REQUEST_METHOD"]=="POST"){
    
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    echo "this is login handler";

    try {
       
        require_once "dbh.php";
        require_once "login.model.php";
        require_once "login.ctrl.php";
        
        $errors = [];
        if(is_inputs_empty($username, $pwd)){
            $errors["empty_inputs"]= "please enter credentials..!";
        }

        $result = get_username($pdo, $username);

        if(is_username_wrong($result)){
            $errors["wrong_username"] = "wrong username..!";
        }

        if(!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])){
            $errors["login_icorrect"] = "Incorrect login info";
        }




        if($errors){
            $_SESSION["errors_login"] = $errors;
            
            header("Location: ../index.php");
            die();
        }


        $newSessionId = session_create_id();
        $sessionId = $newSessionId."-".$result["userId"];
        session_id($sessionId);

        session_start();
        $_SESSION["user_id"]= $result["userId"];
        $_SESSION["username"]  = htmlspecialchars($result["username"]);
    

        header("Location: ../home.php");
        $pdo=null;
        $stmt=null;

        die();



    } catch (PDOException $th) {
        die("query failed : ".$th);
    }


}