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
        if($this->isemptyInput()==true){
            $_SESSION["loginerror"] = "emptyinput";
            header("location: ../login.php");
            exit();
        }else if($this->userNotFound()==true){
            $_SESSION["loginerror"] = "usernotfound";
            header("location: ../login.php");
            exit();
        }else if($this->passwordIncorrect()==true){
            $_SESSION["loginerror"] = "passwordincorrect";
            header("location: ../login.php");
            exit();
        }
        $this->allocateSession();
    }
    private function allocateSession(){
        $_SESSION["username"] = $this->dbusername;
        unset($_SESSION["loginerror"]);
    }
    private function isemptyInput(){
        return empty($this->username) || empty($this->password);
    }
    private function userNotFound(){
        if($this->dbusername=="") return true;
        return false;
    }
    private function passwordIncorrect(){
        $dbpassword = $this->fetchPassword($this->username);
        if(strcmp($dbpassword,$this->password)!==0) return true;
        return false;
    }
}
?>