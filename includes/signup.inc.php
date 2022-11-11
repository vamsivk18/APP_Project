<?php
session_start();
if(isset($_POST["submit"])){
    // Grabbing the data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwdrepeat = $_POST["pwdrepeat"];

    // Instantiate SignupContr class
    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup-contr.classes.php";
    $signup = new SignupContr($name,$email,$username,$password,$pwdrepeat);

    // Running error handlers and user
    $signup->signupUser();

    //Going back to front page
    header("location: ../login.php");
    exit();
}
?>