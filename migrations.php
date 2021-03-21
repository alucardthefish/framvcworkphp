<?php
# **************************************************************************** 
# File: index.php 
# Author: alucardthefish 
# Created: Sat Feb  6 19:35:53 2021 
# Description: Initial point to access the framework
# **************************************************************************** 

use app\controllers\SiteController;
use app\controllers\AuthController;
use alucardthefish\framvcwork\Application;
use Dotenv\Dotenv;

require_once __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();


$config = [
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD']
    ]
];

$app = new Application(__DIR__, $config);


$app->db->applyMigrations();


?>

