<?php
class QuotesContr extends Quotes{

    public function __construct(){
    }
    public function getUserNamebyId($id){
        return $this->dbgetUserNamebyId($id);
    }
    public function getNamebyUsername($username){
        return $this->dbgetnamebyUserName($username);
    }
    public function getAllQuotesUsername($username){
        return $this->dbgetAllQuotesUsername($username);
    }
    public function getQuotesbysearchkey($option,$key){
        return $this->dbgetquotesbysearchkey($option,$key);
    }
    public function getQuoteByIdForUpdate($id){
        if($_SESSION["username"]!==$this->dbgetUserNamebyId($id)){
            header("location ../error.php?error=cannotupdate");
            exit();
        }
        return $this->dbgetQuoteByIdForUpdate($id);
    }
    public function setQuote($quote){
        $this->dbSetQuote($quote,$_SESSION["username"]);
    }
    public function updateQuote($id,$quote){
        $this->dbUpdateQuote($id,$quote);
    }
    public function deleteQuote($id){
        if($_SESSION["username"]!==$this->dbgetUserNamebyId($id)){
            header("location ../error.php?error=cannotdelete");
            exit();
        }
        $this->dbDeleteQuote($id);
    }
}
?>