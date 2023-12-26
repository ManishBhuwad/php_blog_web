    <?php

require_once 'dbh.php';

if(isset($_GET['param']) ? $_GET['param'] : 'DefaultValue'){
    $ids = isset($_GET['param']) ? $_GET['param'] : 'DefaultValue';
    try {
        $query = "SELECT * FROM posts WHERE postId=:postid;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam("postid",$ids);
        $stmt->execute();

        $singleres = $stmt->fetchAll(PDO::FETCH_ASSOC);


        for($i=0; $i<count($singleres); $i++){
            $res = $singleres[$i];
            $singletitle = $res["title"];
            $textcontent = $res["textcontent"];
            $res["image_data"];

        }

        $im =   $res["image_data"];
       
        require_once "../allposts.php";



    } catch (PDOException $th) {
        die("query failed: ". $th);
        header("Location: ../index.php");
    }
}else{
    header("Location: ../index.php");
    die();
}






?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/singlepost.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="main">
    <div class="header">
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" style="margin-right:50px">
                        <img src="../assests/Images/logo2.png" alt="logo" width="80px">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item" style="margin-left:50px">
                        <a class="nav-link active" aria-current="page" href="../home.php" >Home</a>
                        </li>
                        <li class="nav-item" style="margin-left:50px">
                        <a class="nav-link " href="../addpost.inc.php" >Add Post</a>
                        </li>
                        <li class="nav-item" style="margin-left:50px">
                        <a class="nav-link" href="./myposts.inc.php">My Posts</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav   mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" href="./logout.handler.php" id="logoutbtn">Logout</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
    </div>
    <div class="box-cont">
        <div class="wrapper">
                <div class="title-wrap">  
                    <p class="heading">
                        <?php
                            echo strtoupper($singletitle);
                        ?>
                    </p>
                </div>
            <div class="img-wrap"> 
                <?php  
                echo '<img src="upload/'.$im.'" width="300px" height="300px">';
                ?>
            </div>
            <div class="wrap">
                <div class="textcontent-wrap">
                    <p>
                        <?php
                        echo $textcontent;
                        ?>
                    </p>
                    


                </div>
            </div>
        </div>
       
        <div class="right-block">

        <div>
        <?php
        for($i=0; $i<count($result); $i++){
            $psid = $result[$i];
            if($psid['postId']==$ids){
                continue;
            }else{
                $id = $psid['postId'];
            }
            
           

        ?>
        <div class="ps">
            <div class="post-wrap">
                <div class="post-image  p-2 rounded">
                    <?php
                      echo  '<img src="upload/'.$psid["image_data"].'" alt="image" width=100% height="100%">'
                    ?>
                </div>
                <div class="post-content-wrap">
                    <h3 class="title-wrap">
                        <?php
                        $title = $result[$i];
                    
                         echo ucfirst($title["title"]);
                        ?>
                    </h3>
                    <div class="">
                        <?php 
                        $text = $result[$i];
                        $paragraph =   $text["textcontent"];
                        $shorttext = substr($paragraph,0,200);
                        echo '<p>'.ucfirst($shorttext)."...".'</p>';
                        ?>
                    </div>
                    <div class="ps-bottom">
                            <div class="post-social-icon">
                                <li><a href=""><i class="fa-brands fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                                <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
                                <li>posted by: </li>
                            </div>
                            <div class="post-anc-div"><a class="post-anc" href="?param=<?php echo urlencode($id) ?>">Read More</a></div>
                    </div>
                
                </div>
            </div>
        </div>
        <?php } ?>
    </div>


        </div>
    </div>
        
    <div class="footer">

    </div>
       
    <div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>