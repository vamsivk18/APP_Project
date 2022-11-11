<?php
session_start();
include "../classes/dbh.classes.php";
include "../classes/search.classes.php";
include "../classes/search-contr.classes.php";
if(isset($_POST["search"])){
    $_SESSION["searchoption"] = $_POST["searchoption"];
    $_SESSION["searchkey"] = $_POST["searchkey"];
    header("location: ../search.php");
    exit();
}
?>