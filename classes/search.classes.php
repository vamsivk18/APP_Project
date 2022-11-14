<?php
class Search extends Mapper{
    protected function dbfetchsearchquotes(Quote $quote,$type,$key){
        $results = $this->mapgetQuoteData($type,$key);
        return $results;
        // $stmt = $this->connect()->prepare('SELECT * FROM quotes WHERE '.$type.' regexp ?;');
        // if(!$stmt->execute(array($key))){
        //     $stmt = null;
        //     header("location: ../error.php?error=db_getquoteforupdatequotefailed");
        //     exit();
        // }
        // $quotes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // return $quotes;
    }
}
?>