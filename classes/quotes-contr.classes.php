<?php
class QuotesContr extends Quotes{
    private static $instance = null;
    private $quotes;
    private $myquotes;

    private function __construct(){
        $this->verifyLogin();
        $this->quotes = $this->dbfetchQuotes();
        $this->myquotes = $this->dbGetSpecificQuotes("");
    }

    public static function getInstance(){
        if (self::$instance == null)
            self::$instance = new QuotesContr();
        return self::$instance;
    }
    public function setQuote($quote){
        $this->verifyLogin();
        $this->dbSetQuote($quote,$_SESSION["username"]);
        self::$instance = new QuotesContr();
    }
    public function getQuotes(){
        $this->verifyLogin();
        return $this->quotes;
    }
    public function getSpecificQuotes(){
        return $this->myquotes;
    }
    public function deleteQuote($id){
        $username = $this->verifyLogin();
        $realusername = $this->dbgetQuoteUserName($id);
        if($username!==$realusername){
            header("location ../error.php?error=cannotdelete");
            exit();
        }
        $this->dbDeleteQuote($id);
        self::$instance = new QuotesContr();
        header("location: ../welcome.php?error=deletedquotesuccessfully");
    }
    private function verifyLogin(){
        if(!isset($_SESSION["username"])){
            header("location: ../index.php?error=loginfirst".$_GET["deleteid"].$_SESSION["username"]);
            exit();
        }
        return $_SESSION["username"];
    }
}
?>