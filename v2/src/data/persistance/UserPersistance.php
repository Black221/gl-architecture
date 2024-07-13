<?php

require_once 'src/data/persistance/Persistance.php';

class UserPersistance {

    private $persistance;

    public function __construct() {
        $this->persistance = new Persistance("user");
    }

    public function authenticate($user) {
        // $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));
        return $this->persistance->find(
            ["username", "password"], 
            ["=", "="], 
            [$user->getUsername(), $user->getPassword()], 
            ["AND", ""]
        );
    }

    public function register($user) {
        // $user->setPassword(password_hash($user->getPassword(), PASSWORD_BCRYPT));
        return $this->persistance->create($user);
    }

    public function createUser($user) {
        return $this->persistance->create($user);
    }

    public function updateUser($id, $user) {
        return $this->persistance->update($id, $user);
    }

    public function deleteUser($user) {
        return $this->persistance->delete($user);
    }

    public function getUser($id) {
        return $this->persistance->get($id);
    }

    public function getAllUsers() {
        return $this->persistance->getAll();
    }

    public function generateToken($id, $data) {
        return $this->persistance->update($id, $data);
    }

    public function validateToken($token) {
        $date = new DateTime();

        return $this->persistance->find(
            ["token", "expired_date"], 
            ["=", ">="], 
            [$token, $date->format('Y-m-d')], 
            ["AND", ""]
        );
    }
}