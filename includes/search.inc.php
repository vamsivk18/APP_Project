<?php
session_start();
include 'includes.php';
if(isset($_POST["search"])){
    $_SESSION["searchoption"] = $_POST["searchoption"];
    $_SESSION["searchkey"] = $_POST["searchkey"];
    header("location: ../search.php");
    exit();
}
?>