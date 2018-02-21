<?php

namespace authorization\controllers;


use authorization\view\helpers;

class MainpageController
{
    public function actionIndex()
    {   
        if (isset($_POST['logout']))
        {
            unset($_SESSION['logged_user']);
            header('Location: login');
        }

        helpers::render("mainpage");
    }
}


