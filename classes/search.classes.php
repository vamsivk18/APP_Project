<?php
class Search extends Dbh{
    protected function dbfetchsearchquotes($type,$key){
        $stmt = $this->connect()->prepare('SELECT * FROM quotes WHERE '.$type.' regexp ?;');
        if(!$stmt->execute(array($key))){
            $stmt = null;
            header("location: ../error.php?error=db_getquoteforupdatequotefailed");
            exit();
        }
        $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $quotes;
    }
}
?>