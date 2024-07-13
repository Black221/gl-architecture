<?php

require_once 'src/data/persistance/UserPersistance.php';
require_once 'src/models/Token.php';

class TokenService {

    private $userPersistence;

    public function __construct() {
        $this->userPersistence = new UserPersistance();
    }


    public function generateToken($id) {
        $token = bin2hex(random_bytes(8));
        $date = new DateTime();
        $date->add(new DateInterval('P1D'));
        $data = new Token($token, $date);
        $this->userPersistence->generateToken($id, $data);
    }

    

    public function validateToken($token) {
        $res = $this->userPersistence->validateToken($token);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}