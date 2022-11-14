<?php
class Quote{
    private $id;
    private $quote = "";
    private $author = "";
    private $username = "";
    public function __construct()
    {
    }
    public function setQuote($id,$quote,$author,$username){
        $this->setquoteid($id);
        $this->setquotename($quote);
        $this->setauthor($author);
        $this->setusername($username);
    }
    private function setquotename($quote){
        $this->quote = $quote;
    }
    private function setauthor($author){
        $this->author = $author;
    }
    private function setusername($username){
        $this->username = $username;
    }
    private function setquoteid($id){
        $this->id = $id;
    }
    public function getquote() : string{
        return $this->quote;
    }
    public function getauthor() : string{
        return $this->author;
    }
    public function getusername() : string{
        return $this->username;
    }
    public function getid() : string{
        return $this->id;
    }
}
?>