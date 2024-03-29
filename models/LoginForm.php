<?php

namespace app\models;

use alucardthefish\framvcwork\Application;
use alucardthefish\framvcwork\Model;

class LoginForm extends Model
{

    public $email = '';
    public $password = '';

    public function rules() {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function labels()
    {
        return [
            'email' => 'Your email',
            'password' => 'Password'
        ];
    }

    public function login() {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'User does not exist with this email address');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('password', 'Password is incorrect');
            return false;
        }
        return Application::$app->login($user);
    }
}
