<?php
class SignupContr extends SignUp{
    private $name;
    private $email;
    private $username;
    private $password;
    private $pwdrepeat;

    public function __construct($name,$email,$username,$password,$pwdrepeat){
        $this->name = $name;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->pwdrepeat = $pwdrepeat;
    }
    public function signupUser(){
        if($this->isemptyInput() == true) $_SESSION["signuperror"] = "emptyinput";
        else if($this->invalidUserName() == true) $_SESSION["signuperror"] = "invalidusername";
        else if($this->usernameTaken() == true) $_SESSION["signuperror"] = "usernametaken";
        else if($this->invalidEmail() == true) $_SESSION["signuperror"] = "emailtaken";
        else if($this->passwordtooshort()==true) $_SESSION["signuperror"] = "invalidpassword";
        else if($this->pwdMisMatch() == true) $_SESSION["signuperror"] = "pwdmismatch";
        if(isset($_SESSION["signuperror"])){
            header("location: ../signup.php");
            exit();
        }else $this->setUser($this->name,$this->email,$this->username,$this->password);
        
    }
    private function isemptyInput(){
        if(!empty($this->name) && !empty($this->email) && !empty($this->username) && !empty($this->password) && !empty($this->pwdrepeat))
            return false;
        return true;
        
    }
    private function invalidUserName(){
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->username)) return true;
        return false;
    }
    private function invalidEmail(){
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }
    private function passwordtooshort(){
        if(strlen($this->password)<=5) return true;
        return false;
    }
    private function pwdMisMatch(){
        if(strcmp($this->password,$this->pwdrepeat)!==0) return true;
        return false;
    }
    private function usernameTaken(){
        return $this->checkUser($this->username,$this->email);
    }
}
?>