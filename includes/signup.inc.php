<?php
session_start();
include 'includes.php';
if(isset($_POST["submit"])){
    // Grabbing the data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $pwdrepeat = $_POST["pwdrepeat"];

    // Instantiate SignupContr class
    $user = new User($name,$email,$username,$password);
    $signup = new SignupContr($user,$pwdrepeat);

    // Running error handlers and user
    $signup->signupUser();

    //Going back to front page
    header("location: ../login.php?sup=sus");
    exit();
}
?>