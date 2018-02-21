<?php

namespace authorization\controllers;

use authorization\models\Users;
use authorization\models\Sessions;
use authorization\view\helpers;

class LogInController
{
    public function actionIndex()
    {   
        if (isset( $_SESSION['logged_user']))
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
                    $_SESSION['logged_user'] = $data['login'];
                  // $userId = getUserId($data['login']);
                //    $ip = $_SERVER['REMOTE_ADDR'];
                //    insertLoggedUser($userId,$ip)



                   

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


