<?php
# **************************************************************************** 
# File: Application.php 
# Author: alucardthefish 
# Created: Sat Feb  6 19:49:00 2021 
# Description:  
# **************************************************************************** 

namespace app\core;


class Application {

	#public Router $router;
	public static $ROOT_DIR;
	public $router;
	public $request;
	public $response;
	public $session;
	public $db;

	public static $app;
	public $controller;
	
	public function __construct($root_path, $config) {

		self::$ROOT_DIR = $root_path;
		self::$app = $this;
		$this->request = new Request();
		$this->response = new Response();
		$this->session = new Session();
		$this->router = new Router($this->request, $this->response);

		$this->db = new Database($config['db']);

	}

	public function run() {
		
		echo $this->router->resolve();

	}

	public function setController($ctrller) {
		$this->controller = $ctrller;
	}

	public function getController() {
		return $this->controller;
	}
}

?>

