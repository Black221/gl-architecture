<?php

class Request {

    private $entity;
    private $id;
    private $data;

    public function __construct($entity, $id, $data) {
        $this->entity = $entity;
        $this->id = $id;
        $this->data = $data;
    }

    public function getEntity() {
        return $this->entity;
    }

    public function getId() {
        return $this->id;
    }

    public function getData() {
        return $this->data;
    }
}