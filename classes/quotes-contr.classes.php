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
    public function updateQuote($id,$quote){
        $this->dbUpdateQuote($id,$quote);
        self::$instance = new QuotesContr();
    }
    public function setQuote($quote){
        $this->dbSetQuote($quote,$_SESSION["username"]);
        self::$instance = new QuotesContr();
    }
    public function getQuotes(){
        return $this->quotes;
    }
    public function getSearchQuotes(){
        return $this->searchquotes;
    }
    public function getQuotesbysearchkey($option,$key){
        return $this->dbgetquotesbysearchkey($option,$key);
    }
    public function getSpecificQuotes(){
        return $this->myquotes;
    }
    public function getQuote($id){
        $realusername = $this->dbgetQuoteUserName($id);
        if($_SESSION["username"]!==$realusername){
            header("location ../error.php?error=cannotupdate");
            exit();
        }
        return $this->dbgetQuote($id);
    }
    public function deleteQuote($id){
        $realusername = $this->dbgetQuoteUserName($id);
        if($_SESSION["username"]!==$realusername){
            header("location ../error.php?error=cannotdelete");
            exit();
        }
        $this->dbDeleteQuote($id);
        self::$instance = new QuotesContr();
    }
}
?>