<?php
class SignUp extends Dbh{
    protected function setUser($uname,$email,$username,$password){
        $stmt = $this->connect()->prepare('INSERT INTO users(name,email,username,password) VALUES (?,?,?,?)');
        $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
        if(!$stmt->execute(array($uname,$email,$username,$password))){
            $stmt = null;
            header("location: ../signup.php?error=db_signupinsertfailed");
            exit();
        }
    }

    protected function checkUser($username,$email){
        $stmt = $this->connect()->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');
        if(!$stmt->execute(array($username,$email))){
            $stmt = null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        if($stmt->rowCount()>0) return true;
        return false;
    }
}
?>