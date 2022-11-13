<?php
class ProfileContr extends Profile{
    private static $instance = null;
    private $username;
    private $profile;
    private function __construct($username){
        $this->profile = $this->dbgetprofile($username);
    }
    public static function getInstance($username){
        if(self::$instance==null || self::$instance->username!==$username) 
            self::$instance = new ProfileContr($username);
        return self::$instance;
    }
    public function getprofile(){
        return $this->profile;
    }
}
?>