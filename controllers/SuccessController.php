<?php

namespace authorization\controllers;


use authorization\view\helpers;

class SuccessController
{
    public function actionIndex()
    {   
        
        if (isset( $_SESSION['logged_user']))
        {
            header('Location: main');
        }
        else
        {
            helpers::render("success");
        }

        
    }
}