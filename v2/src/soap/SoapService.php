<?php

require_once 'src/services/UserService.php';
require_once 'src/services/TokenService.php';
require_once 'src/models/UserRequest.php';
require_once 'src/models/Response.php';

class SoapService {

    private $userService;
    private $tokenService;    

    public function __construct() {
        $this->userService = new UserService();
        $this->tokenService = new TokenService();
    }

    public function generateToken($id, $token = "") {
        if (!$this->tokenService->validateToken($token)) {
            return Response::fromArray( ["message" => "Invalid token"]);
        }
        $data = array("token" => $this->tokenService->generateToken($id));
        return convertData($data, "json");
    }

    public function authenticate($username, $password) {
        $data = array("username" => $username, "password" => $password);
        $res = $this->userService->authenticate(json_encode($data));
        return convertData($res, "json");
    }

    public function getUser($id, $token = "") {
        if (!$this->tokenService->validateToken($token)) {
            return Response::fromArray( ["message" => "Invalid token"]);
        }   
        $res = $this->userService->getUser($id);
        return convertData($res, "json");
    }

    public function getAllUsers($token = "") {
        if (!$this->tokenService->validateToken($token)) {
            return Response::fromArray( ["message" => "Invalid token"]);
        }
        $res = $this->userService->getAllUsers();
        return convertData($res, "json");
    }

    public function createUser($username, $password, $token = "") {
        $data = array("username" => $username, "password" => $password);
        if (!$this->tokenService->validateToken($token)) {
            return Response::fromArray( ["message" => "Invalid token"]);
        }
        $res = $this->userService->createUser(json_encode($data));
        return convertData($res, "json");
    }

    public function updateUser($id, $username, $password, $role, $token = "") {
        $data = array("username" => $username, "password" => $password, "role" => $role);
        if (!$this->tokenService->validateToken($token)) {
            return Response::fromArray( ["message" => "Invalid token"]);
        }
        $res = $this->userService->updateUser($id, json_encode($data));
        return convertData($res, "json");
    }

    public function deleteUser($id, $token = "") {
        if (!$this->tokenService->validateToken($token)) {
            return Response::fromArray( ["message" => "Invalid token"]);
        }
        $res = $this->userService->deleteUser($id);
        return convertData($res, "json");
    }
}