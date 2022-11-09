<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Login</title>
</head>
<body style="margin:50px;">
    <div>
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>
        <?php
        session_start();
        if(isset($_SESSION["loginerror"])){
            $loginerror = $_SESSION["loginerror"];
            if($loginerror=="emptyinput"){
                print("<p class='alert alert-warning'>One or more fields is Empty</p>");
            }else if($loginerror=="usernotfound"){
                print("<p class='alert alert-warning'>User doesnot exist</p>");
            }else if($loginerror=="passwordincorrect"){
                print("<p class='alert alert-warning'>Password is Incorrect</p>");
            }
            unset($_SESSION["loginerror"]);
        }else print("<br><br><br>");
    ?>
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