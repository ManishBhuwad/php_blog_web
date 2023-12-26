<?php
    session_start();

    if(!isset($_SESSION["user_id"])){
        header("Location: index.php");
        die();

    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/addpost.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
      tinymce.init({
        selector: '#mytextarea',
        plugins: 'autolink lists link  charmap print preview anchor',
            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link '
      });
    </script>
</head>
<body>
    <div class="main">
        <div class="header">
            <nav class="navbar navbar-expand-lg bg-body-tertiary navbg">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#" style="margin-right:50px">
                        <img src="./assests/Images/logo2.png" alt="logo" width="80px">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item" style="margin-left:50px">
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item" style="margin-left:50px">
                        <a class="nav-link active" href="#" onclick="preventDefault();">Add Post</a>
                        </li>
                        <li class="nav-item" style="margin-left:50px">
                        <a class="nav-link" href="includes/myposts.inc.php">My Posts</a>
                        </li>
                    </ul>
                
                    
                    <!-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                    <ul class="navbar-nav   mb-2 mb-lg-0">
                        <li class="nav-item">
                        <a class="nav-link" href="includes/logout.handler.php" id="logoutbtn">Logout</a>
                        </li>
                    </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="formwrapper">
            <form action="includes/addpost_handler.inc.php" method="post" enctype="multipart/form-data" class="">
                <div class="title">
                    <label for="inptitle">Title  </label>
                    <input type="text" id="inptitle"name="title" placeholder ="Enter title">
                </div>
                <div class="txtarea">
                    <textarea name="textcontent" id="mytextarea"></textarea>
                </div>
                <div class="upld-img">
                    <label for="image">Upload Image</label>
                    <input type="file" id="image" name="uploadImage" accept="image/*">
                </div>
                <input type="submit"value="SUBMIT" class="sbt"></input>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>