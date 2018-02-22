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
            
            unset($_SESSION['logged_user']);
            unset($_SESSION['user_id']);
            unset($_COOKIE['hash']);
            Current_sessions::deleteSession($_SESSION['userId']);
             header('Location: login');
            
        }
        
            helpers::render("mainpage");
        
    }
}


