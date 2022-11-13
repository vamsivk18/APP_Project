<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/login_signup_styles.css">
    <title>SIGN UP</title>
</head>
<body>
    <div class="center">
        <h2>SIGN UP</h2>
        <?php include 'includes.php';R::ss();R::signupDataCheck();?>
        <form action="includes/signup.inc.php" method="post">
            <div class="txt_field">
                <input type="text" name="name" placeholder="Name"><label></label>
            </div>
            <div class="txt_field">
                <input type="email" name="email" placeholder="E-mail"><label></label>
            </div>
            <div class="txt_field">
                <input type="text" name="username" placeholder="Username"><label></label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" placeholder="Password"><label></label>
            </div>
            <div class="txt_field">
                <input type="password" name="pwdrepeat" placeholder="Repeat Password"><label></label>
            </div>
            <button type="submit" name="submit">SIGN UP</button>
            <div  class="signup_link">Already a member? <a href="login.php">Login</a></div>
        </form>
    </div>
</body>
</html>