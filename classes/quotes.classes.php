<?php
class Quotes extends Dbh{
    private function __construct(){}
    protected function dbFetchQuotes(){
        $stmt = $this->connect()->prepare("SELECT * from quotes;");
        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../error.php?error=db_fetchquotesfailed");
            exit();
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    protected function dbGetName($username){
        $stmt = $this->connect()->prepare('SELECT name FROM users WHERE username=?;');
        if(!$stmt->execute(array($username))){
            $stmt = null;
            header("location: ../error.php?error=db_getnameforsetquotefailed");
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt = null;
            header("location: ../error.php?error=db_nousername");
            exit();
        }
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]["name"];
    }
    protected function dbSetQuote($quote,$username){
        $stmt = $this->connect()->prepare('SELECT name FROM users WHERE username=?;');
        if(!$stmt->execute(array($username))){
            $stmt = null;
            header("location: ../error.php?error=db_getnameforsetquotefailed");
            exit();
        }
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $name = $row[0]["name"];
        $stmt = $this->connect()->prepare("INSERT INTO quotes(quote,author,username) values(?,?,?);");
        if(!$stmt->execute(array($quote,$name,$username))){
            $stmt = null;
            header("location: ../error.php?error=db_setquotefailed");
            exit();
        }
    }
    protected function dbGetSpecificQuotes($author){
        if($author==""){
            $stmt = $this->connect()->prepare('SELECT quote from quotes where username=?;');
            if(!$stmt->execute(array($_SESSION["username"]))){
                $stmt = null;
            header("location: ../error.php?error=db_getspecificquotesfailed");
            exit();
            }
            $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return array($this->dbGetName($_SESSION["username"]),$quotes);
        }
    }
}
?>