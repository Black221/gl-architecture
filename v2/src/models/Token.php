<?php

class Token {
    public $token;
    public $expired_date;

    public function __construct($token, $date) {
        $this->token = $token;
        $this->expired_date = $date;
    }

    public function toArray() {
        return [
            "token" => $this->token,
            "expired_date" => $this->expired_date
        ];
    }
}