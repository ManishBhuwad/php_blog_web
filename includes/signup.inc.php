<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="signup.handler.php" method="post">
            <div>
                <label for="username">Enter username</label>
                <input type="text" name="username">
            </div>
            <div>
                <label for="email">Enter email</label>
                <input type="email" name="email">
            </div>
            <div>
                <label for="pwd">Enter password</label>
                <input type="password" name="pwd">
            </div>
            <input type="submit" value="register">
        </form>
    </div>
</body>
</html>