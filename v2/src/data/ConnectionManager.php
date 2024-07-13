<?php

class ConnectionManager {

    private static $instance;

    private $connection;
    private $username = "root";
    private $password = "";
    private $host = "localhost";
    private $database = "mglsi_news";

    private function __construct() {

        $this->connection = new PDO("mysql:host=$this->host;dbname=$this->database", $this->username, $this->password);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance(): self {
        if (!isset(self::$instance)) {
            self::$instance = new Self();
        }
        return self::$instance;
    }

    public function closeConnection() {
        $this->connection = null;
    }

    // --------------------------------------------------------------------
    // ------------------------Without Prepared Statements-----------------
    // --------------------------------------------------------------------
    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function execute($sql) {
        return $this->connection->exec($sql);
    }

    public function fetch($sql) {
        return $this->connection->query($sql)->fetch();
    }

    public function fetchAll($sql) {
        return $this->connection->query($sql)->fetchAll();
    }
}