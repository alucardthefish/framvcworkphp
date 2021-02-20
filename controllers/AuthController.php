<?php
# **************************************************************************** 
# File: AuthController.php 
# Author: alucardthefish 
# Created: Mon Feb 15 20:34:31 2021 
# Description:  
# **************************************************************************** 

namespace app\controllers;

use app\core\Controller;
use app\models\RegisterModel;

class AuthController extends Controller
{
    public function login() {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register($request) {

        if ($request->isPost()) {
            $registerModel = new RegisterModel();
            return 'Handle submitted data';
        }
        $this->setLayout('auth');
        return $this->render('register');
    }
}



?>

