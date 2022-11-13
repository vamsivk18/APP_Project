<?php
session_start();
include 'includes.php';
$quotesContr = new QuotesContr();
if(isset($_POST["addquote"])){
    $quote = $_POST["quote"];
    $quotesContr->setQuote($quote);
    $_SESSION["quotestatus"] = "added";
    header("location: ../welcome.php");
    exit();
}
if(isset($_POST["updatequotebutton"])){
    $updatedquote = $_POST["updatequote"];
    $quotesContr->updateQuote($_GET["updateid"],$updatedquote);
    $_SESSION["quotestatus"] = "updated";
    $value = $_SESSION["quotestatus"];
    header("location: ../welcome.php?error=$value");
    exit();
}
if(isset($_GET["deleteid"])){
    $id = $_GET["deleteid"];
    $quotesContr->deleteQuote($id);
    $_SESSION["quotestatus"] = "deleted";
    header("location: ../welcome.php");
    exit();
}
?>