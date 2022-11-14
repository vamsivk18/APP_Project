<?php
class ProfileContr extends Profile{
    private static $instance = null;
    private User $user;
    private function __construct($username){
        $user = new User();
        $user->setUsername($username);
        $this->user = $this->parseUserFromMapper($user);
    }
    public static function getInstance($username){
        if(self::$instance==null || self::$instance->username!==$username) 
            self::$instance = new ProfileContr($username);
        return self::$instance;
    }
    public function getuser():User{
        return $this->user;
    }
}
?>