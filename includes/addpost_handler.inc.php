<?php

session_start();

if(isset($_SESSION["user_id"])){

    $userid = $_SESSION["user_id"];
    echo $userid;

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $title = $_POST["title"];
    $textcontent = $_POST["textcontent"];

    $folder = 'upload/';
    $imageFile = $_FILES['uploadImage']['name'];
    $file = $_FILES['uploadImage']['tmp_name'];
    $path = $folder.$imageFile;
    $target_file = $folder.basename($imageFile);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

      

           

        if(empty($title)|| empty($textcontent)){
            header("Location: ../addpost.inc.php");
    
        }else{
    
            require_once "dbh.php";
    
            try {
                
                $query = "INSERT INTO posts(title, textcontent,image_data,userid) VALUES(:title, :textcontent, :imageFile, :userid);";
    
                $stmt = $pdo->prepare($query);
                $stmt->bindParam("title",$title);
                $stmt->bindParam("textcontent",$textcontent);
                $stmt->bindParam("imageFile", $imageFile);
                $stmt->bindParam("userid", $userid);
                
                $stmt->execute();
                move_uploaded_file($file,$target_file);
                header("Location: ../home.php");
    
            } catch (PDOException $th) {
                die("query failed: ".$th);
            }
    
        }
        

    }else{
        header("Location: ../addpost.inc.php");
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php


    echo '<img src="" alt=" img">'

    ?>
</body>
</html>