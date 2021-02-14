<?php
# **************************************************************************** 
# File: Router.php 
# Author: alucardthefish 
# Created: Sun Feb  7 14:07:00 2021 
# Description: Router class of our framework 
# **************************************************************************** 

namespace app\core;

class Router
{
    public $request;
    public $response;
    #protected array $routes = [];
    protected $routes = [];

    public function __construct($request, $response) {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback){

        $this->routes['get'][$path] = $callback;

    }

    public function post($path, $callback){

        $this->routes['post'][$path] = $callback;

    }

    public function resolve() {

        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;
        if ($callback === false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');
        }

        if (is_string($callback)) {
            
            return $this->renderView($callback);
        }

        return call_user_func($callback);

        // echo '<pre>';
        // var_dump($callback);
        // echo '</pre>';
        // exit;
    }


    public function renderView($view) {

        $layoutContent = $this->layoutContent();
        $viewContent = $this->renderOnlyView($view);
        return str_replace('{{content}}', $viewContent, $layoutContent);
        //include_once Application::$ROOT_DIR . "/views/$view.php";

    }

    public function renderContent($viewContent) {

        $layoutContent = $this->layoutContent();
        return str_replace('{{content}}', $viewContent, $layoutContent);

    }

    protected function layoutContent() {

        ob_start();
        include_once Application::$ROOT_DIR . "/views/layouts/main.php";
        $layCont = ob_get_contents();
        ob_get_clean();
        return $layCont;
    }

    protected function renderOnlyView($view) {

        ob_start();
        include_once Application::$ROOT_DIR . "/views/$view.php";
        $onlyView = ob_get_contents();
        ob_get_clean();
        return $onlyView;

    }

}

?>

