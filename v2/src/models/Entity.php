<?php

interface Entity {


    public function getClassName();

    public function toArray();

    public static function fromArray($array);

    public function toJson();

    public static function fromJson($json);

    public function toXML();

    public static function fromXML($xml);

}