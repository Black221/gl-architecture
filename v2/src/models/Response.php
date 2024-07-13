<?php

class Response implements Entity {

    private $status;
    private $message;
    private $data;

    public function __construct($status, $message, $data) {
        $this->status = $status;
        $this->message = $message;
        $this->data = $data;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getMessage() {
        return $this->message;
    }

    public function getData() {
        return $this->data;
    }

    public function getClassName() {
        return "Response";
    }

    public function toJson() {
        return json_encode ($this->toArray());
    }

    public function toArray() {
        return [
            "status" => $this->status,
            "message" => $this->message,
            "data" => $this->data
        ];
    }

    public static function fromArray($array) {
        return new Response(
            $array["status"],
            $array["message"],
            $array["data"]
        );
    }

    public static function fromJson($json) {
        return new Response(
            $json["status"],
            $json["message"],
            $json["data"]
        );
    }

    public function toXML() {
        $xml = new SimpleXMLElement('<response/>');
        $xml->addChild('status', $this->status);
        $xml->addChild('message', $this->message);
        $xml->addChild('data', $this->data);
        return $xml->asXML();
    }

    public static function fromXML($xml) {
        $xml = simplexml_load_string($xml);
        return new Response(
            $xml->status,
            $xml->message,
            $xml->data
        );
    }

    public function __toString() {
        return json_encode($this->toJson());
    }


}