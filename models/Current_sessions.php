<?php
namespace authorization\models;

use authorization\classes\getInfo\classes\user_id;
use authorization\config\db;
use authorization\classes\sql;
use PDO;


class Current_sessions
{
    public static function insertLoggedUser($userId,$ip,$salt,$hash)
    {
        $pdo = db::getConnection();
        
        $sql = "INSERT INTO current_sessions (`user_id`,`ip`, `salt`,`hash`)
                VALUES('$userId','$ip','$salt','$hash')";
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
   
    public static function isUserLogged()
    {
        if (!isset($_SESSION['userId']))
        {
            
            if (isset($_COOKIE['user']))
            {
                $userId = Users::getUserId($_COOKIE['user']);
                $_SESSION['userId'] = $userId['id'];
                self::isUserLogged();
            }
            
        }
        else
        {
             
            $salt  = self::getSalt($_SESSION['userId']);
            
            if (isset($_COOKIE['user']) )
            {     
                if (password_verify(($_COOKIE['user'].$salt["salt"]), $_COOKIE['hash']))
                {
                      
                    return TRUE;
                }
               
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