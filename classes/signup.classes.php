<?php
class SignUp extends Mapper{

    protected function dbsetUser($user){
        $this->mapcreateUser($user);
    }

    protected function dbcheckifexists(User $user){
        $results = $this->mapgetUserData($user);
        if(sizeof($results)==0) return false;
        return true;
    }
}
?>