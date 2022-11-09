<?php
class QuotesContr extends Quotes{
    private static $instance = null;
    private $quotes;
    private $myquotes;

    private function __construct(){
        $this->quotes = $this->dbfetchQuotes();
        $this->myquotes = $this->dbGetSpecificQuotes("");
    }

    public static function getInstance(){
    if (self::$instance == null)
        self::$instance = new QuotesContr();
    return self::$instance;
    }
    public function setQuote($quote){
        session_start();
        $this->dbSetQuote($quote,$_SESSION["username"]);
        self::$instance = new QuotesContr();
    }
    public function getQuotes(){
        return $this->quotes;
    }
    public function getSpecificQuotes(){
        return $this->myquotes;
    }
}
?>