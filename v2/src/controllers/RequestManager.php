<?php

class RequestManager {


    private function __construct() {

    }

    public static function getInstance() {
        static $instance = null;
        if ($instance === null) {
            $instance = new RequestManager();
        }
        return $instance;
    }

    public function getRoute () {
        $request = $_SERVER['REQUEST_URI'];
        $request = explode('/', $request);
        $route = $request[2];
        return $route;
    }

    public function getMethod () {
        $request = $_SERVER['REQUEST_URI'];
        $request = explode('/', $request);
        $method = $request[3];
        return $method;
    }

    public function getParams () {
        $request = $_SERVER['REQUEST_URI'];
        $params = explode('?', $request);
        if (count($params) < 2) {
            return [];
        }
        $params = explode('&', $params[1]);
        $result = [];
        foreach ($params as $key => $value) {
            $param = explode('=', $value);
            $result[$param[0]] = $param[1] ?? null;
        }
        return $result;
    }

    public function getParam ($param) {
        $params = $this->getParams();
        if (!isset($params[$param])) {
            return null;
        }
        return $params[$param];
    }

    public function getBody () {
        $body = file_get_contents('php://input');
        if (str_contains($body, "&") || str_contains($body, "=")) {
            $tmp = explode('&', $body);
            $body = [];
            for ($i = 0; $i < count($tmp); $i++) {
                $param = explode('=', $tmp[$i]);
                $body[$param[0]] = str_replace("+", " ", $param[1]);
            }
            $body = json_encode($body);
        }
        return $body;
    }

    public function getHeaders () {
        $headers = getallheaders();
        return $headers;
    }

    public function getQuery () {
        $query = $_SERVER['QUERY_STRING'];
        return $query;
    }

    public function getFiles () {
        $files = $_FILES;
        return $files;
    }

    public function getCookie () {
        $cookie = $_COOKIE;
        return $cookie;
    }

    public function getServer () {
        $server = $_SERVER;
        return $server;
    }
}