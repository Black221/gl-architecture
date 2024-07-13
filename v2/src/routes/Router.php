<?php

class Router {

    private $routes = [];
    private static $instance = null;

    private function __construct() {

    }

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Router();
        }
        return self::$instance;
    }

    public function add($method, $uri, $callback) {
        $this->routes[$method][$uri] = $callback;
    }

    public function run() {

        $baseUrl = '';
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];
        // remove parameters
        $uri = explode('?', $uri)[0];
        $uri = str_replace($baseUrl, '', $uri);
        // session management
        session_start();


        if (isset($this->routes[$method][$uri])) {
            $callback = $this->routes[$method][$uri];
            $callback();
        } else {
            require_once 'src\\views\\404.php';
        }
    }
}