<?php
class LoginContr extends Login{
    private $username;
    private $password;
    private $dbusername;

    public function __construct($username,$password){
        $this->username = $username;
        $this->password = $password;
    }
    public function loginUser(){
        if($this->isemptyInput()==true){
            header("location: ../index.php?error=emptyinput");
            exit();
        }else if($this->userNotFound()==true){
            // print($this->dbusername);
            header("location: ../index.php?error=usernotfound$this->dbusername");
            exit();
        }else if($this->passwordIncorrect()==true){
            header("location: ../index.php?error=passwordincorrect");
            exit();
        }
        $this->allocateSession();
    }
    private function allocateSession(){
        session_start();
        $_SESSION["username"] = $this->dbusername;
    }
    private function isemptyInput(){
        return empty($this->username) || empty($this->password);
    }
    private function userNotFound(){
        $this->dbusername = $this->fetchUserName($this->username);
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