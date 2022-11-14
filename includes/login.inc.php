<?php
session_start();
if(isset($_POST["submit"])){
    include 'includes.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $user = new User();
    $user->setUser("",$username,$username,$password);
    $login = new LoginContr($user);

    if($login->loginUser()==true) header("location: ../welcome.php");
    else header("location: ../login.php");
    exit();
}
?>