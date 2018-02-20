<?php

namespace authorization\controllers;

use authorization\models\Users;
use authorization\view\helpers;

class LogInController
{
    public function actionIndex()
    {   
        $data = $_POST;

        if (isset($data['do_login']))
        {        
            $errors = array();
            $isLogin = Users::doLogIn($data['login'],$data['password']);
            
            if ($isLogin == 'ok')
            {
                //echo 'все ок';
                
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


