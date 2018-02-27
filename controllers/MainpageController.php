<?php

namespace authorization\controllers;

use authorization\models\Current_sessions;


use authorization\view\helpers;

class MainpageController
{
    public function actionIndex()
    {   
        
        if ((isset($_POST['logout'])))
        {
            
            setcookie('hash', $hash, 1);
            setcookie('user', $_SESSION['logged_user'], 1);
            unset($_SESSION['user_id']);
            Current_sessions::deleteSession($_SESSION['userId']);
             header('Location: login');
            
        }
        
            helpers::render("mainpage");
        
    }
}


