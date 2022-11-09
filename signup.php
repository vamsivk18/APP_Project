<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>SIGN UP</title>
</head>
<body>
    <?php
        session_start();
    ?>
    <div>
        <h2>SIGN UP</h2>
        <p>Please fill in your credentials to Sign Up.</p>
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