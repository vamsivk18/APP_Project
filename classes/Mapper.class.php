<?php
class Mapper extends Dbh{
    private function mapprepare($stmt) : PDOStatement{
        return $this->connect()->prepare($stmt);
    }
    private function mapexecutestmt($stmt,$values) :PDOStatement{
        if(!$stmt->execute($values)){
            $stmt = null;
            header("location: ../signup.php?error=db_signupinsertfailed");
            exit();
        }
        return $stmt;
    }
    protected function mapcreateUser(User $user){
        $qurey = 'INSERT INTO users(name,email,username,password) VALUES (?,?,?,?)';
        $stmt = $this->mapprepare($qurey);
        $values = array($user->getName(),$user->getEmail(),$user->getUsername(),$user->getPassword());
        $this->mapexecutestmt($stmt,$values);
    }
    protected function mapgetUserData(User $user) :array{
        $query = 'SELECT * from users where username=? OR email=?';
        $stmt = $this->mapprepare($query);
        $values = array($user->getUsername(),$user->getEmail());
        return $this->mapexecutestmt($stmt,$values)->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>