<?php

require_once 'src/models/Entity.php';

class UserRequest implements Entity {

    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getClassName() {
        return 'User';
    }

    public static function fromJson($json) {
        $data = json_decode($json, true);
        return new UserRequest(
            $data['username'],
            $data['password']
        );
    }

    public function toJson() {
        return json_encode([
            'username' => $this->username,
            'password' => $this->password
        ]);
    }

    public function toArray() {
        return [
            'username' => $this->username,
            'password' => $this->password
        ];
    }

    public static function fromArray($array) {
        return new UserRequest(
            $array['username'],
            $array['password']
        );
    }

    public function toXML() {
        $xml = new DOMDocument("1.0", "UTF-8");
        $user = $xml->createElement('User');
        $xml->appendChild($user);
        $user->appendChild($xml->createElement('username', $this->username));
        $user->appendChild($xml->createElement('password', $this->password));
        return $xml->saveXML();
    }

    public static function fromXML($xml) {
        $doc = new SimpleXMLElement($xml);
        return new UserRequest(
            $doc->username,
            $doc->password
        );
    }
}