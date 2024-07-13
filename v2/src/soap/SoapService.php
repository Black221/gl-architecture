<?php

require_once 'src/services/UserService.php';
require_once 'src/services/TokenService.php';

class SoapService {

    private $userService;
    private $tokenService;    

    public function __construct() {
        $this->userService = new UserService();
        $this->tokenService = new TokenService();
    }

    public function authenticate($data) {
        return $this->userService->authenticate($data);
    }

    public function getUser($id, $token = "") {
        if (!$this->tokenService->validateToken($token)) {
            return "Invalid token";
        }   
        return $this->userService->getUser($id);
    }

    public function getAllUsers($token = "") {
        if (!$this->tokenService->validateToken($token)) {
            return "Invalid token";
        }
        return $this->userService->getAllUsers();
    }

    public function createUser($data, $token = "") {
        if (!$this->tokenService->validateToken($token)) {
            return "Invalid token";
        }
        return $this->userService->createUser($data);
    }

    public function updateUser($id, $data, $token = "") {
        if (!$this->tokenService->validateToken($token)) {
            return "Invalid token";
        }
        return $this->userService->updateUser($id, $data);
    }

    public function deleteUser($id, $token = "") {
        if (!$this->tokenService->validateToken($token)) {
            return "Invalid token";
        }
        return $this->userService->deleteUser($id);
    }
}