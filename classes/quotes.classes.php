<?php
class Quotes extends Dbh{
    protected function fetchQuotes(){
        $stmt = $this->connect()->prepare("SELECT * from quotes;");
        if(!$stmt->execute()){
            $stmt = null;
            header("location: ../error.php?error=db_fetchquotesfailed");
            exit();
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
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
}
?>