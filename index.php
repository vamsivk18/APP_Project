<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <div>
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <form action="includes/login.inc.php" method="post">
                <label>Username:</label>
                <input type="text" name="username" placeholder="Username">
                <br><br>
                <label>Password :</label>
                <input type="password" name="password" placeholder="Password">
            <br><br>
            <button type="submit" name="submit">LOGIN</button>
            <p>Don't have an account? <a href="signup.php">Sign up now</a>.</p>
        </form>
    </div>
</body>
</html>