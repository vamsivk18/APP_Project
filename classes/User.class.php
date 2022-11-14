<?php
class User{
    private $name;
    private $email;
    private $username;
    private $password;
    public function __construct($name,$email,$username,$password)
    {
        $this->setName($name);
        $this->setemail($email);
        $this->setusername($username);
        $this->setpassword($password);
    }
    public function getName() : string{
        return $this->name;
    }
    public function getEmail() : string{
        return $this->email;
    }
    public function getUsername() : string{
        return $this->username;
    }
    public function getPassword() : string{
        return $this->password;
    }
    public function setName($name) : void{
        $this->name = $name;
    }
    public function setEmail($email) : void{
        $this->email = $email;
    }
    public function setUsername($username) : void{
        $this->username = $username;
    }
    public function setPassword($password) : void{
        $this->password = $password;
    }
}
?>