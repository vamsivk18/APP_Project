<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/login_signup_styles.css">
    <title>Login</title>
</head>
<body>
    <div class="center">
        <h2>Login</h2>
        <?php 
        include './includes.php';
        R::ss(); R::loginDataCheck();?>
        <form action="includes/login.inc.php" method="post">
            <div class="txt_field">
                <input type="text" name="username" placeholder="Username"><label></label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" placeholder="Password"><label></label>
            </div>
            <div class="pass">Forgot Password?</div>
            <button type="submit" name="submit">Login</button>
            <div  class="signup_link">Not a member? <a href="signup.php">Sign Up</a></div>
        </form>
    </div>
</body>
</html>