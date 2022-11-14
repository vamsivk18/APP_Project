<?php
class Profile extends Mapper{
    protected function parseUserFromMapper(User $user):User{
        $results = $this->mapgetUserData($user);
        if(sizeof($results)==0) return new User();
        else return $results[0];
    }
}
?>