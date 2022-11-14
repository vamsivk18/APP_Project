<?php
class LoginContr extends Login{
    private User $user;
    private User $realuser;

    public function __construct(User $user){
        $this->user = $user;
        $this->realuser = $this->fetchrealUser($user);
    }
    public function loginUser(){
        if($this->isemptyInput()==true) $_SESSION["loginerror"] = "emptyinput";
        else if($this->userNotFound()==true) $_SESSION["loginerror"] = "usernotfound";
        else if($this->passwordIncorrect()==true) $_SESSION["loginerror"] = "passwordincorrect";
        if(isset($_SESSION["loginerror"])) return false;
        else return $this->allocateSession();
    }
    private function allocateSession(){
        $_SESSION["username"] = $this->realuser->getUsername();
        unset($_SESSION["loginerror"]);
        return true;
    }
    public function isemptyInput(){
        return empty($this->user->getusername()) || empty($this->user->getPassword());
    }
    public function userNotFound(){
        if($this->realuser->getUsername()=="") return true;
        return false;
    }
    public function passwordIncorrect(){
        if(strcmp($this->realuser->getPassword(),$this->user->getpassword())!==0) return true;
        return false;
    }
}
?>