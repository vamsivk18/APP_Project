<?php
session_start();
include "../classes/dbh.classes.php";
include "../classes/quotes.classes.php";
include "../classes/quotes-contr.classes.php";
$quotesContr = QuotesContr::getInstance();
if(isset($_POST["submit"])){
    $quote = $_POST["quote"];
    $quotesContr->setQuote($quote);
    header("location: ../welcome.php?error=none");
    exit();
}
if(isset($_GET["deleteid"])){
    $id = $_GET["deleteid"];
    $quotesContr->deleteQuote($id);
}
?>