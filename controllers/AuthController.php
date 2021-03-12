<?php
# **************************************************************************** 
# File: AuthController.php 
# Author: alucardthefish 
# Created: Mon Feb 15 20:34:31 2021 
# Description:  
# **************************************************************************** 

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\LoginForm;
use app\models\User;

class AuthController extends Controller
{
    public function login($request, $response) {
        $loginForm = new LoginForm();
        if ($request->isPost()) {
            $loginForm->loadData($request->getBody());
            if ($loginForm->validate() && $loginForm->login()) {
                $response->redirect('/');
                
                return;
            }
        }

        $this->setLayout('auth');
        return $this->render('login', [
            'model' => $loginForm
        ]);
    }

    public function register($request) {

        $userModel = new User();
        if ($request->isPost()) {
            $userModel->loadData($request->getBody());

            if ($userModel->validate() && $userModel->save()) {
                Application::$app->session->setFlash('success', 'Thanks for registering');
                Application::$app->response->redirect('/');
                exit;
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

    public function logout($request, $response) {
        Application::$app->logout();
        $response->redirect('/');
    }
}



?>

