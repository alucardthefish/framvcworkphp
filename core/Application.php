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
	public static $app;
	
	public function __construct($root_path) {

		self::$ROOT_DIR = $root_path;
		self::$app = $this;
		$this->request = new Request();
		$this->response = new Response();
		$this->router = new Router($this->request);

	}

	public function run() {
		
		echo $this->router->resolve();
		# minuto 21:41

	}
}

?>

