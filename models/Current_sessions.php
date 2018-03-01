<?php
namespace authorization\models;

use authorization\classes\getInfo\classes\user_id;
use authorization\config\db;
use authorization\classes\sql;
use PDO;


class Current_sessions
{
    public static function insertLoggedUser($userId,$ip,$hash)
    {
        $pdo = db::getConnection();
        
        $sql = "INSERT INTO current_sessions (`user_id`,`ip`,`hash`)
                VALUES('$userId','$ip','$hash')";
        $pdo->exec($sql);
    }

    public static function getSalt($userId)
    {
        $pdo = db::getConnection();

        $sql = "SELECT salt FROM current_sessions WHERE user_id='$userId'";
        $result = $pdo->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $current = $result->fetch();
        
        return $current;
    }

    public static function getUserId($hash)
    {
        $pdo = db::getConnection();

        $sql = "SELECT user_id FROM current_sessions WHERE hash='$hash'";
        $result = $pdo->prepare($sql);
        $result->execute();
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $current = $result->fetch();
        
        return $current;
    }

   
    public static function isUserLogged()
    {
   
        if (isset($_COOKIE['hash']))
        {
            $userId = self::getUserId($_COOKIE['hash']);
            
            if ($userId != NULL)
            {
                $username = Users::getUsername($userId['user_id']);
                $_SESSION['logged_user'] = $username['username'];
                return TRUE;
            }

        }
    }
    public static function deleteSession($userId)
    {
        $pdo = db::getConnection();
        $sql = "DELETE FROM current_sessions WHERE user_id = '$userId'";
        $pdo->exec($sql);
    }
}