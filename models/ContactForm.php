<?php

namespace app\models;

use alucardthefish\framvcwork\Model;

class ContactForm extends Model
{
    
    public $subject = '';
    public $email = '';
    public $body = '';

    public function rules()
    {
        return [
            'subject' => [self::RULE_REQUIRED],
            'email' => [self::RULE_REQUIRED],
            'body' => [self::RULE_REQUIRED]
        ];
    }

    public function labels()
    {
        return [
            'subject' => 'Enter your subject',
            'email' => 'Your email',
            'body' => 'Body'
        ];
    }

    public function send() {
        return true;
    }
}
