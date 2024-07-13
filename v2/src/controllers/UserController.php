<?php

require_once 'src/services/UserService.php';
require_once 'src/controllers/RequestManager.php';

class UserController {

    private $userService;
    private $requestManager;

    public function __construct() {
        $this->userService = new UserService();
        $this->requestManager = RequestManager::getInstance();
    }

    public function getAllUsers() {
        $result = $this->userService->getAllUsers();
        return $result;
    }

    public function authenticate() {
        $user = $this->requestManager->getBody();
        $res = $this->userService->authenticate($user);
        return $res;
    }

    public function register() {
        $user = $this->requestManager->getBody();
        return $this->userService->register($user);
    }
    

    public function create() {
        $user = $this->requestManager->getBody();
        $this->userService->createUser($user);
    }

    public function update() {
        $user = $this->requestManager->getBody();
        $id = $this->requestManager->getParam("id");
        $this->userService->updateUser($id, $user);
    }

    public function delete() {
        $user = $this->requestManager->getBody();
        $this->userService->deleteUser($user);
    }
}