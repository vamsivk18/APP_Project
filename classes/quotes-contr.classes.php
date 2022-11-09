<?php
class QuotesContr extends Quotes{
    private $quotes;
    private $addquote;
    public function __construct(){
        $this->quotes = $this->fetchQuotes();
    }
    public function setQuote($quote){
        session_start();
        $this->dbSetQuote($quote,$_SESSION["username"]);
    }
    public function getQuotes(){
        return $this->quotes;
    }
}
?>