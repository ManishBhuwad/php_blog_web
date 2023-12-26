<?php


session_start();
    if(isset($_SESSION["user_id"])){

      header("Location: home.php");

    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/indexpage.css">
</head>
<body>
    <div>
    <div class="cont">
    <div class="form sign-in">
        <form action="includes/login.handler.php" method="post">
            <h2>Sign In</h2>
            <label>
                <span>username</span>
                <input type="text" name="username">
            </label>
            <label>
                <span>Password</span>
                <input type="password" name="pwd">
            </label>
            <button class="submit" type="submit">Sign In</button>
        </form>
      
      <p class="forgot-pass">Forgot Password ?</p>

      <div class="social-media">
        <ul>
          <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/facebook.png"></li>
          <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/twitter.png"></li>
          <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/linkedin.png"></li>
          <li><img src="https://raw.githubusercontent.com/abo-elnoUr/public-assets/master/instagram.png"></li>
        </ul>
      </div>
    </div>

    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>New here?</h2>
          <p>Sign up and discover great amount of new opportunities!</p>
        </div>
        <div class="img-text m-in">
          <h2>One of us?</h2>
          <p>If you already has an account, just sign in. We've missed you!</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Sign Up</span>
          <span class="m-in">Sign In</span>
        </div>
      </div>
      <div class="form sign-up">
        <form action="includes/signup.handler.php" method="post">
            <h2>Sign Up</h2>
            <label>
            <span>Name</span>
            <input type="text" name="username">
            </label>
            <label>
            <span>Email</span>
            <input type="email" name="email">
            </label>
            <label>
            <span>Password</span>
            <input type="password" name="pwd">
            </label>
            <label>
            <span>Confirm Password</span>
            <input type="password">
            </label>
            <button type="submit" class="submit">Sign Up Now</button>
        </form>
      </div>
    </div>
  </div>
    </div>









    <script>
        document.querySelector('.img-btn').addEventListener('click', function()
	    {
		document.querySelector('.cont').classList.toggle('s-signup')
	    }
        );
    </script>


</body>
</html>