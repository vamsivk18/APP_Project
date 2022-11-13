<?php
class Profile extends Dbh{
    protected function dbgetprofile($username){
        $stmt = $this->connect()->prepare("SELECT * from users where username=?");
        if(!$stmt->execute(array($username))){
            $stmt = null;
            header("location: ../error.php?error=db_getprofilefailed");
            exit();
        }
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $row[0];
    }
}
?>