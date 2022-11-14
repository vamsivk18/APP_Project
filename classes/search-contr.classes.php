<?php
class SearchContr extends Search{
    private static $instance = null;
    private $searchoption;
    private $searchkey;
    private $searchquotes = array();

    public function __construct($searchtype,$searchfor){
        $this->searchtype = $searchtype;
        $this->searchfor = $searchfor;
        $this->searchquotes = $this->dbfetchsearchquotes(new Quote(),$searchtype,$searchfor);
    }
    public static function getInstance($searchoption,$searchkey){
        if(self::$instance==null || self::$instance->searchoption!==$searchoption || self::$instance->searchkey!==$searchkey)
        self::$instance = new SearchContr($searchoption,$searchkey);
        return self::$instance;
    }
    public function getsearchquotes(){
        return $this->searchquotes;
    }
}
?>