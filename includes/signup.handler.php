<?php


    if($_SERVER["REQUEST_METHOD"]=="POST"){

        $username = $_POST["username"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];

        try {
            
            require_once 'dbh.php';
            require_once 'signup.model.php';
            require_once 'signup.ctrl.php';

            $errors = [];

            if(is_inputs_empty($username, $email, $pwd)){
                $errors["empty_inputs"] = "fill in all fields";
            }

            if(is_email_invalid($email)){
                $errors["invalid_email"] = 'Invalid email used..!';
            }

            if(is_username_taken($username , $pdo)){
                $errors["username_taken"] = 'username already taken..!';
            }

            if(is_email_registered($pdo, $email)){
                $errors["email_registered"] = 'email already registered..!';
            }


            if($errors){
                
                header("Location:../index.php");
            }else{
                create_user($pdo,$username, $email, $pwd);
                header("Location: ../home.php");
                echo "sucess";
            }
            







        } catch (PDOException $th) {
            die("query failed : ".$th);
        }

    }


