<?php
session_start();
if(isset($_POST["submit"])){
    include 'includes.php';
    $username = $_POST["username"];
    $password = $_POST["password"];
    $login = new LoginContr($username,$password);

    $login->loginUser();

    header("location: ../welcome.php");
    exit();
}
?>