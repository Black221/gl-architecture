<?php

require_once 'src/data/persistance/UserPersistance.php';
require_once 'src/models/Token.php';
require_once 'src/models/Response.php';

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
        $res = $this->userPersistence->generateToken($id, $data);
        if ($res) {
            return Response::fromArray(["token" => $token]);
        } else {
            return Response::fromArray(["message" => "Error generating token"]);
        }
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