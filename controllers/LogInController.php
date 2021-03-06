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
        $crypto = new generator;
        
        Current_sessions::insertLoggedUser($userId['id'],$ip,$crypto->hash);

        $_SESSION['logged_user'] = $data['login'];
        setcookie('hash', $crypto->hash, time()+604800);
        
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


