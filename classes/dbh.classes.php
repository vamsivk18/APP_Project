<?php
class Dbh{
    protected function connect(){
        try {
            $username = "root";
            $password = "";
            $database = "app_project";
            $dbh = new PDO('mysql:host=localhost;dbname=app_project',$username,$password);
            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
?>