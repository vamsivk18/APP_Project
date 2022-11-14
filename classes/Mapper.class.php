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
    //mapgetuserdata will return array of User objects
    protected function mapgetUserData(User $user) :array{
        $query = 'SELECT * from users where username=? OR email=?';
        $stmt = $this->mapprepare($query);
        $values = array($user->getUsername(),$user->getEmail());
        $results = $this->mapexecutestmt($stmt,$values)->fetchAll(PDO::FETCH_ASSOC);
        $arrayresult = array();
        foreach($results as $row){
            $user = new User();
            $user->setUser($row["name"],$row["email"],$row["username"],$row["password"]);
            array_push($arrayresult,$user);
        }
        return $arrayresult;
    }
    protected function mapUser(User $userarray):User{
        $user = new User();
        $user->setUser($userarray->getName(),$userarray->getEmail(),$userarray->getUsername(),$userarray->getPassword());
        return $user;
    }
}
?>