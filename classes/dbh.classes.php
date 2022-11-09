<?php
class Dbh{
    protected function connect(){
        try {
            $username = "root";
            $password = "";
            $database = "app_proj";
            $dbh = new PDO('mysql:host=localhost;dbname=app_proj',$username,$password);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
?>