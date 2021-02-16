<?php
# **************************************************************************** 
# File: AuthController.php 
# Author: alucardthefish 
# Created: Mon Feb 15 20:34:31 2021 
# Description:  
# **************************************************************************** 

namespace app\controllers;

use app\core\Controller;

class AuthController extends Controller
{
    public function login() {
        return $this->render('login');
    }

    public function register($request) {
        if ($request->isPost()) {
            return 'Handle submitted data';
        }
        return $this->render('register');
    }
}



?>

