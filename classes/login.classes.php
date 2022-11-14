<?php
class Login extends Mapper{
    protected function fetchrealUser(User $user):User{
        $results = $this->mapgetUserData($user);
        if(sizeof($results)==0) return new User();
        else return $results[0];
    }
    protected function fetchUserName($username){
        $stmt = $this->connect()->prepare("SELECT username from users where username=? OR email=?;");
        if(!$stmt->execute(array($username,$username))){
            $stmt = null;
            header("location: ../login.php?error=db_loginfetchusernamefailed");
            exit();
        }
        if($stmt->rowCount()==0) return "";
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]["username"];
    }
    protected function fetchPassword($username){
        $stmt = $this->connect()->prepare("SELECT password from users where username=? OR email=?;");
        if(!$stmt->execute(array($username,$username))){
            $stmt = null;
            header("location: ../login.php?error=db_loginpasswordfetchfailed");
            exit();
        }
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row[0]["password"];
    }
}
?>