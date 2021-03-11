<?php
# **************************************************************************** 
# File: RegisterModel.php 
# Author: alucardthefish 
# Created: Fri Feb 19 22:38:55 2021 
# Description:  
# **************************************************************************** 

namespace app\models;

use app\core\DbModel;

class User extends DbModel {

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_DELETED = 2;

    public $firstname = '';
    public $lastname = '';
    public $email = '';
    public $status = self::STATUS_INACTIVE;
    public $password = '';
    public $confirmPassword = '';

    public static function tableName()
    {
        return 'users';
    }

    public function attributes()
    {
        return ['firstname', 'lastname', 'email', 'password', 'status'];
    }

    public function save() {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password, PASSWORD_DEFAULT);
        return parent::save();
    }

    public function rules() {
        return [
            'firstname' => [self::RULE_REQUIRED],
            'lastname' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL, [
                self::RULE_UNIQUE, 'class' => self::class
            ]],
            'password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'min' => 8], [self::RULE_MAX, 'max' => 24]],
            'confirmPassword' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'match' => 'password']],
        ];
    }

    public function labels()
    {
        return [
            'firstname' => 'First name',
            'lastname' => 'Last name',
            'email' => 'Email',
            'password' => 'Password',
            'confirmPassword' => 'Confirm password'
        ];
    }

    public static function primaryKey()
    {
        return 'id';
    }
}


?>

