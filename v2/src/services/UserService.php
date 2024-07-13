<?php

require_once 'src/models/User.php';
require_once 'src/models/UserRequest.php';
require_once 'src/models/Response.php';
require_once 'src/data/persistance/UserPersistance.php';

class UserService {

    private $userPersistance;

    public function __construct() {
        $this->userPersistance = new UserPersistance();
    }

    public function authenticate($data) {
        $user = UserRequest::fromJson($data);
        $res = $this->userPersistance->authenticate($user);
        if (count($res) > 0) {
            return User::fromArray($res[0]);
        }
        return Response::fromArray(["message" => "Invalid username or password"]);
    }

    public function register($data) {
        $user = UserRequest::fromJson($data);
        $res = $this->userPersistance->register($user);
        return Response::fromArray($res);
    }

    public function createUser($user) {
        $obj = UserRequest::fromJson($user);
        $res = $this->userPersistance->createUser($obj);
        return Response::fromArray($res);
    }

    public function updateUser($id, $user) {
        $obj = UserRequest::fromJson($user);
        $res = $this->userPersistance->updateUser($id, $obj);
        return Response::fromArray($res);
    }

    public function deleteUser($user) {
        $res = $this->userPersistance->deleteUser($user);
        return Response::fromArray($res);
    }

    public function getUser($id) {
        $res = $this->userPersistance->getUser($id);
        if ($res == null)
            return Response::fromArray(["message" => "User not found"]);
        return User::fromArray($res);
    }

    public function getAllUsers() {
        $res = $this->userPersistance->getAllUsers();
        $users = [];
        foreach ($res as $user) {
            $users[] = User::fromArray($user);
        }
        return $users;
    }    
}