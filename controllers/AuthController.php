<?php
# **************************************************************************** 
# File: AuthController.php 
# Author: alucardthefish 
# Created: Mon Feb 15 20:34:31 2021 
# Description:  
# **************************************************************************** 

namespace app\controllers;

use app\core\Controller;
use app\models\User;

class AuthController extends Controller
{
    public function login() {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register($request) {

        $userModel = new User();
        if ($request->isPost()) {
            $userModel->loadData($request->getBody());

            if ($userModel->validate() && $userModel->save()) {
                return 'Success';
            }

            return $this->render('register', [
                'model' => $userModel
            ]);
        }

        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $userModel
        ]);
    }
}



?>

