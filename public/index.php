<?php
# **************************************************************************** 
# File: index.php 
# Author: alucardthefish 
# Created: Sat Feb  6 19:35:53 2021 
# Description: Initial point to access the framework
# **************************************************************************** 

require_once __DIR__.'/../vendor/autoload.php';

use app\controllers\SiteController;
use app\core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [SiteController::class, 'home']);

//$app->router->get('/contact', 'contact');
$app->router->get('/contact', [SiteController::class, 'contact']);

$app->router->post('/contact', [SiteController::class, 'handleContact']);

$app->run();


?>

