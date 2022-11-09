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
        if($this->isemptyInput() == true) {
            //printf($this->name . $this->email . $this->username . $this->password . $this->pwdrepeat);
            header("location: ../signup.php?error=emptyinput");
            exit();
        }
        if($this->invalidUserName() == true) {
            header("location: ../signup.php?error=username");
            exit();
        }
        if($this->invalidEmail() == true) {
            header("location: ../signup.php?error=email");
            exit();
        }
        if($this->pwdMisMatch() == true) {
            header("location: ../signup.php?error=pwdmatch");
            exit();
        }
        if($this->usernameTaken() == true) {
            header("location: ../signup.php?error=usernametaken");
            exit();
        }
        $this->setUser($this->name,$this->email,$this->username,$this->password);
    }
    private function isemptyInput(){
        //return isset($this->name) && isset($this->email) && isset($this->username) && isset($this->password) && isset($this->pwdrepeat);
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
    private function pwdMisMatch(){
        if(strcmp($this->password,$this->pwdrepeat)!==0) return true;
        return false;
    }
    private function usernameTaken(){
        return $this->checkUser($this->username,$this->email);
    }
}
?>