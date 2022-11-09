<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>SIGN UP</title>
</head>
<body style="margin: 50px;">
    <div>
        <h2>SIGN UP</h2>
        <p>Please fill in your credentials to Sign Up.</p>
        <?php
        session_start();
        if(isset($_SESSION["signuperror"])){
            $signuperror = $_SESSION["signuperror"];
            if($signuperror=="emptyinput"){
                print("<p class='alert alert-warning'>One or more fields is empty</p>");
            }else if($signuperror=="invalidusername"){
                print("<p class='alert alert-warning'>Invalid Username, please enter username with alphabets and numbers only.</p>");
            }else if($signuperror=="usernametaken"){
                print("<p class='alert alert-warning'>User with this username exists</p>");
            }else if($signuperror=="emailtaken"){
                print("<p class='alert alert-warning'>User with this email exists</p>");
            }else if($signuperror=="emailtaken"){
                print("<p class='alert alert-warning'>Password mismatch</p>");
            }
            unset($_SESSION["signuperror"]);
        }else print("<br><br><br>");
    ?>
        <form action="includes/signup.inc.php" method="post">
                <label>Name&emsp;&emsp;&emsp;&emsp;&emsp;:</label><input type="text" name="name" placeholder="Name"><br><br>
                <label>E-mail&emsp;&emsp;&ensp;&emsp;&emsp;:</label><input type="email" name="email" placeholder="E-mail"><br><br>
                <label>Username&emsp;&nbsp;&emsp;&emsp;:</label><input type="text" name="username" placeholder="Username"><br><br>
                <label>Password&emsp;&ensp;&emsp;&emsp;:</label><input type="password" name="password" placeholder="Password"><br><br>
                <label>Repeat Password&ensp;:</label><input type="password" name="pwdrepeat" placeholder="Repeat Password"><br><br>
            <button type="submit" name="submit">SIGN UP</button>
            <p>Already have an account? <a href="index.php">Login now</a>.</p>
        </form>
    </div>
</body>
</html>