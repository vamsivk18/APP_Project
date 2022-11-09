<?php
if(isset($_POST["submit"])){
    $quote = $_POST["quote"];

    include "../classes/dbh.classes.php";
    include "../classes/quotes.classes.php";
    include "../classes/quotes-contr.classes.php";
    $addQuote = QuotesContr::getInstance();

    $addQuote->setQuote($quote);

    header("location: ../welcome.php?error=none");
    exit();
}
?>