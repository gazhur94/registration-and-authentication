<?php

namespace authorization\controllers;

use authorization\models\Users;
use authorization\view\helpers;


class SignUpController
{
    public function actionIndex()
    {
         

         $data = $_POST;
         if (isset($data['do_signup']))
         {
             $errors = array();

             if (trim($data['login'])=='')
             {
                 $errors = 'Введіть логін';
             }
             
             if ($data['password']=='')
             {
                 $errors = 'Введіть пароль';
             }

             if ($data['password'] != $data['password_2'])
             {
                 $errors = 'Паролі не співпадають';
             }

             if (trim($data['email'])=='')
             {
                 $errors = 'Введіть емейл';
             }

             $dublUser = Users::isDublUsername($data['login']);

             if ($dublUser != NULL)
             {
                 $errors = $dublUser;
             }

             $dublEmail = Users::isDublEmail($data['email']);

             if ($dublEmail != NULL)
             {
                 $errors = $dublEmail;
             }
             

             if(empty($errors))
             {
                users::InsertData($data['login'],$data['email'],password_hash($data['password'], PASSWORD_DEFAULT));

                echo 'Ви зареєстровані';
             }
            //  else
            //  {
            //     $_SESSION['errors'] = $errors;
            //  }
             
         }
         if (empty($errors))
         {
            
            helpers::render("signUp", ["error" => ""]);
         }
         else
         {
            
            helpers::render("signUp", ["error" => "$errors"]);
           
         }
         
    }

}


