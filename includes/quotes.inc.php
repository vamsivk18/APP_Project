<?php
session_start();
include "../classes/dbh.classes.php";
include "../classes/quotes.classes.php";
include "../classes/quotes-contr.classes.php";
if(isset($_POST["addquote"])){
    $quotesContr = QuotesContr::getInstance();
    $quote = $_POST["quote"];
    $quotesContr->setQuote($quote);
    $_SESSION["quotestatus"] = "added";
    header("location: ../welcome.php");
    exit();
}
if(isset($_POST["updatequotebutton"])){
    $quotesContr = QuotesContr::getInstance();
    $updatedquote = $_POST["updatequote"];
    $quotesContr->updateQuote($_GET["updateid"],$updatedquote);
    $_SESSION["quotestatus"] = "updated";
    $value = $_SESSION["quotestatus"];
    header("location: ../welcome.php?error=$value");
    exit();
}
if(isset($_GET["deleteid"])){
    $quotesContr = QuotesContr::getInstance();
    $id = $_GET["deleteid"];
    $quotesContr->deleteQuote($id);
    $_SESSION["quotestatus"] = "deleted";
    header("location: ../welcome.php");
    exit();
}
?>