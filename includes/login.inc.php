<?php
session_start();
if(isset($_POST["submit"])){
    include 'includes.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $login = new LoginContr($username,$password);

    if($login->loginUser()==true)
    header("location: ../welcome.php");
    else header("location: ../login.php");
    exit();
}
?>