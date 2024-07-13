<?php

require_once 'src/models/Entity.php';

class User implements Entity {

    private $id;
    private $username;
    private $password;
    private $role;
    private $token;
    private $expired_date;

    public function __construct($id, $username, $password, $role, $token, $expired_date) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->token = $token;
        $this->expired_date = $expired_date;
    }

    public function getClassName() {
        return 'User';
    }

    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getRole() {
        return $this->role;
    }

    public function getToken() {
        return $this->token;
    }

    public function getExpiredDate() {
        return $this->expired_date;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setRole($role) {
        $this->role = $role;
    }

    public function setToken($token) {
        $this->token = $token;
    }

    public function setExpiredDate($expired_date) {
        $this->expired_date = $expired_date;
    }

    public function toArray() {
        return [
            "id" => $this->id,
            "username" => $this->username,
            "password" => $this->password,
            "role" => $this->role,
            "token" => $this->token,
            "expired_date" => $this->expired_date
        ];
    }

    public static function fromArray($array) {
        $user = new User(
            $array["id"], 
            $array["username"], 
            $array["password"], 
            $array["role"], 
            $array["token"], 
            $array["expired_date"]
        );
        return $user;
    }

    public function toJSON() {
        return json_encode($this->toArray());
    }

    public static function fromJSON($json) {
        return User::fromArray(json_decode($json, true));
    }

    public function toXML() {
        $xml = new DOMDocument("1.0", "UTF-8");
        $xml->formatOutput = true;
        $data = $xml->createElement("user");
        $xml->appendChild($data);
        $data->appendChild($xml->createElement("id", $this->id));
        $data->appendChild($xml->createElement("username", $this->username));
        $data->appendChild($xml->createElement("password", $this->password));
        $data->appendChild($xml->createElement("role", $this->role));
        $data->appendChild($xml->createElement("token", $this->token));
        $data->appendChild($xml->createElement("expired_date", $this->expired_date));
        return $xml->saveXML();
    }

    public static function fromXML($xml) {
        $xml = new SimpleXMLElement($xml);
        return new User($xml->id, $xml->username, $xml->password, $xml->role, $xml->token, $xml->expired_date);
    }
}