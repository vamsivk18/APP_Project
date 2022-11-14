<?php
class SignupContr extends SignUp{
    private User $user;
    private $pwdrepeat;

    public function __construct(User $user,$pwdrepeat){
        $this->user = $user;
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
            return false;
        }else {
            $this->dbsetUser($this->user);
            return true;
        }
        
    }
    private function isemptyInput(){
        if(!empty($this->user->getName()) && !empty($this->user->getEmail()) && !empty($this->user->getusername()) && !empty($this->user->getpassword()) && !empty($this->pwdrepeat))
            return false;
        return true;
    }
    private function invalidUserName(){
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->user->getusername())) return true;
        return false;
    }
    private function invalidEmail(){
        if(!filter_var($this->user->getEmail(), FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }
    private function passwordtooshort(){
        if(strlen($this->user->getPassword())<=5) return true;
        return false;
    }
    private function pwdMisMatch(){
        if(strcmp($this->user->getPassword(),$this->pwdrepeat)!==0) return true;
        return false;
    }
    private function usernameTaken(){
        return $this->dbcheckifexists($this->user);
    }
}
?>