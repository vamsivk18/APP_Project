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

    $user = new User();
    $user->setUser($name,$email,$username,$password);
    $signup = new SignupContr($user,$pwdrepeat);

    if($signup->signupUser()==true) header("location: ../login.php?sup=sus");
    else header("location: ../login.php");
    exit();
}
?>