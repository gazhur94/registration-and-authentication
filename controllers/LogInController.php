<?php

namespace authorization\controllers;

use authorization\models\Users;
use authorization\models\Current_sessions;
use authorization\view\helpers;
use authorization\components\generator;

class LogInController
{
    private static function createAndInsertLoggedUserData()
    {
        $data = $_POST;
        $userId = Users::getUserId($data['login']);
        $_SESSION['userId'] = $userId['id'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $salt = generator::generateSalt();
        $hash = password_hash(($data['login'].$salt), PASSWORD_DEFAULT);
        Current_sessions::insertLoggedUser($userId['id'],$ip,$salt,$hash);

        $_SESSION['logged_user'] = $data['login'];
        setcookie('hash', $hash, time()+3600);
        setcookie('user', $_SESSION['logged_user'], time()+3600);
        
    }

    public function actionIndex()
    {   
       
        if (Current_sessions::isUserLogged() == TRUE)
            {    
                
                header('Location: main');
            }
        
        else
        {
            $data = $_POST;
            if (isset($data['do_login']))
            {   
                    
                $errors = array();
                $isLogin = Users::doLogIn($data['login'],$data['password']);
                
                if ($isLogin == 'ok')
                {
                  
                   self::createAndInsertLoggedUserData();
                   header('Location: main');


                }
                else
                {
                    $errors = 'Неправильний логін чи пароль';
                }


            }
        

            if (empty($errors))
            {
                
               helpers::render("logIn", ["error" => ""]);
            }
            else
            {
            
                helpers::render("logIn", ["error" => "$errors"]);
            
            }
        }

    
    }
}


