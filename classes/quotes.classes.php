<?php
class Quotes extends Dbh{
    private function __construct(){}
    protected function dbGetAllQuotesUsername($username){
        if($username=='-') {
            $stmt = $this->connect()->prepare("SELECT * from quotes;");
            if(!$stmt->execute()){
                $stmt = null;
                header("location: ../error.php?error=db_getallquotesfailed");
                exit();
            }
        }else {
            $stmt = $this->connect()->prepare("SELECT * from quotes where username=?;");
            if(!$stmt->execute(array($username))){
                $stmt = null;
                header("location: ../error.php?error=db_getallquotesusernamefailed");
                exit();
            }
        }
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }
    protected function dbGetNamebyusername($username){
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
    protected function dbgetUserNamebyId($id){
        $stmt = $this->connect()->prepare('SELECT username FROM quotes WHERE id=?;');
        if(!$stmt->execute(array($id))){
            $stmt = null;
            header("location: ../error.php?error=db_getusernamefordeletequotefailed");
            exit();
        }
        if($stmt->rowCount()==0){
            $stmt = null;
            header("location: ../error.php?error=db_nousername");
            exit();
        }
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]["username"];
    }
    protected function dbgetQuoteByIdForUpdate($id){
        $stmt = $this->connect()->prepare('SELECT * FROM quotes WHERE id=?;');
        if(!$stmt->execute(array($id))){
            $stmt = null;
            header("location: ../error.php?error=db_getquotebyidforupdatefailed");
            exit();
        }
        $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $quotes[0];
    }
    protected function dbgetquotesbysearchkey($type,$key){
        $stmt = $this->connect()->prepare('SELECT * FROM quotes WHERE ? regexp ?;');
        if(!$stmt->execute(array($type,$key))){
            $stmt = null;
            header("location: ../error.php?error=db_getquoteforupdatequotefailed");
            exit();
        }
        $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $quotes;
    }
    protected function dbUpdateQuote($id,$quote){
        $stmt = $this->connect()->prepare('UPDATE quotes set quote=? WHERE id=?;');
        if(!$stmt->execute(array($quote,$id))){
            $stmt = null;
            header("location: ../error.php?error=db_updatequotefailed");
            exit();
        }
    }
    protected function dbDeleteQuote($id){
        $stmt = $this->connect()->prepare('DELETE FROM quotes WHERE id=?;');
        if(!$stmt->execute(array($id))){
            $stmt = null;
            header("location: ../error.php?error=db_deletequotefailed");
            exit();
        }
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
    // protected function dbGetSpecificQuotes($author){
    //     if($author==""){
    //         $stmt = $this->connect()->prepare('SELECT quote from quotes where username=?;');
    //         if(!$stmt->execute(array($_SESSION["username"]))){
    //             $stmt = null;
    //         header("location: ../error.php?error=db_getspecificquotesfailed");
    //         exit();
    //         }
    //         $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return array($this->dbGetNamebyusername($_SESSION["username"]),$quotes);
    //     }
    // }
}
?>