<?php
class LoginContr extends Login{
    private $username;
    private $password;
    private $dbusername;

    public function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
        $this->dbusername = $this->fetchUserName($username);
    }
    public function loginUser(){
        if($this->isemptyInput()==true) $_SESSION["loginerror"] = "emptyinput";
        else if($this->userNotFound()==true) $_SESSION["loginerror"] = "usernotfound";
        else if($this->passwordIncorrect()==true) $_SESSION["loginerror"] = "passwordincorrect";
        if(isset($_SESSION["loginerror"])) return false;
        else return $this->allocateSession();
    }
    private function allocateSession(){
        $_SESSION["username"] = $this->dbusername;
        unset($_SESSION["loginerror"]);
        return true;
    }
    public function isemptyInput(){
        return empty($this->username) || empty($this->password);
    }
    public function userNotFound(){
        if($this->dbusername=="") return true;
        return false;
    }
    public function passwordIncorrect(){
        $dbpassword = $this->fetchPassword($this->username);
        if(strcmp($dbpassword,$this->password)!==0) return true;
        return false;
    }
}
?>