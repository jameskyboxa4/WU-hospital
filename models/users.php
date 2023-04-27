<?php


// Use the dbhost property in your code

class DB_Users 
{
    
    private $dbcon;

    public function __construct()
    {
        try {
            $this->dbcon = new PDO("mysql:host = localhost; dbname = wu", "root", "");
            $this->dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //  echo "Connect to database successful";
        } catch (PDOException $e) {
            echo "Faild to Connect database" . $e->getMessage();
        }
    }

    public function fecth_all_users()
    {
        $sql = "SELECT * FROM wu.users ";
    
        try {
            $query = $this->dbcon->prepare($sql);
            $query->bindParam(':token', $userid, PDO::PARAM_STR);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo "Faild to fetchdata " . $e->getMessage();
            return null;
        }
    }
    public function fecth_users($userid)
    {
        $sql = "SELECT uid, user, pass, email FROM wu.users WHERE uid=:uid";
    
        try {
            $stmt = $this->dbcon->prepare($sql);
            $stmt->bindParam(':uid', $userid);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result;
        } catch (PDOException $e) {
            echo "Faild to fetchdata " . $e->getMessage();
            return null;
        }
    }

}