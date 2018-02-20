<?php
namespace authorization\models;

use authorization\classes\getInfo\classes\user_id;
use authorization\config\db;
use authorization\classes\sql;
use PDO;


class Users
{
    
    public static function insertData($login,$email,$password)
    {
       
        $pdo = db::getConnection();
        
        $sql = "INSERT INTO users (`username`,`email`,`password`)
                VALUES('$login','$email','$password')";
        $pdo->exec($sql);
    }   
    public static function isDublUsername($username)
    {
        $pdo = db::getConnection();

        $sql = "SELECT username FROM users WHERE username='$username'";
        $result = $pdo->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $current = $result->fetch();
        
        if ($current != NULL)
        {
            $error = "Користувач з логіном $username вже існує";
            return $error;
        }
        else
        {
            return NULL;
        }
    }

    public static function isDublEmail($email)
    {
        $pdo = db::getConnection();

        $sql = "SELECT email FROM users WHERE email='$email'";
        $result = $pdo->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $current = $result->fetch();
        
        if ($current != NULL)
        {
            $error = "Користувач з емейлом $email вже існує";
            return $error;
        }
        else
        {
            return NULL;
        }
    }
   
    public static function doLogIn($login,$password)
    {
        $pdo = db::getConnection();

        $sql = "SELECT `username`, `password` FROM users WHERE username='$login'";
        $result = $pdo->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $userData = $result->fetch();
        

        if (($userData != NULL))
        {
            if(password_verify($password, $userData["password"]))
            {
                return 'ok';
            }
        }
      

        
    }



}