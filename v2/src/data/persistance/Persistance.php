<?php

require_once './src/data/ConnectionManager.php';

class Persistance {

    private $connectionManager;
    private $tableName;

    public function __construct(array | string $tableName) {
        $this->connectionManager = ConnectionManager::getInstance();
        $this->tableName = $tableName;
    }

    public function getTableName() {
        return $this->tableName;
    }

    public function setTableName($tableName) {
        $this->tableName = $tableName;
    }

    public function getConnectionManager() {
        return $this->connectionManager;
    }

    public function setConnectionManager($connectionManager) {
        $this->connectionManager = $connectionManager;
    }

    public function create($object) {
        $array = $object->toArray();
        
        $sql = "INSERT INTO " . $this->tableName;
        $sql .= " (" . implode(",", array_keys($array)) . ")";
        $sql .= " VALUES (";

        // Combine the values of the array into a string
        foreach ($array as $key => $value) {
            if (is_string($value)) { $sql .= "'$value',"; } else { $sql .= "$value,"; }
        }
        // Remove the last comma
        $sql = rtrim($sql, ",");
        $sql .= ")";
        $res = $this->connectionManager->execute($sql);
        if ($res) {
            return [
                "message" => "Success",
                "data" => null,
                "status" => 200
            ];
        } else {
            return [
                "message" => "Failed",
                "data" => null,
                "status" => 400
            ];
        }
    }

    public function update($id, $object) {
        $sql = "UPDATE " . $this->tableName . " SET ";
        $array = $object->toArray();
        // Combine the keys and values of the array into a string
        foreach ($array as $key => $value) {
            if (is_string($value)) { $sql .= "$key = '$value',"; }
            else if ($value instanceof DateTime) { $sql .= "$key = '" . $value->format('Y-m-d') . "',"; }
            else { $sql .= "$key = $value,"; }
        }
        // Remove the last comma
        $sql = rtrim($sql, ",");
        // Add the WHERE clause
        $sql .= " WHERE id = $id";

        $res = $this->connectionManager->execute($sql);
        if ($res) {
            return [
                "message" => "Success",
                "data" => null,
                "status" => 200
            ];
        } else {
            return [
                "message" => "Failed",
                "data" => null,
                "status" => 400
            ];
        }
    }

    public function delete($id) {
        $sql = "DELETE FROM " . $this->tableName . " WHERE id = $id";
        $res = $this->connectionManager->execute($sql);
        if ($res) {
            return [
                "message" => "Success",
                "data" => null,
                "status" => 200
            ];
        } else {
            return [
                "message" => "Failed",
                "data" => null,
                "status" => 400
            ];
        }
    }

    public function get($id) {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE id = $id";
        return $this->connectionManager->fetch($sql);
    }

    public function getAll() {
        $sql = "SELECT * FROM " . $this->tableName;
        return $this->connectionManager->fetchAll($sql);
    }

    public function find($columns, $ops, $values, $conditions) {
        $sql = "SELECT * FROM ";
        $sql .= $this->tableName;
        $sql .= " WHERE ";
        // verify that the number of columns, conditions, and values are the same
        if (count($columns) != count($conditions) || count($conditions) != count($values) || count($columns) != count($ops)){
            return false;
        }
        // Combine the columns, conditions, and values into a string
        for ($i = 0; $i < count($columns); $i++) {
            if (is_string($values[$i]))
                $values[$i] = "'".$values[$i]."'";
            $sql .= $columns[$i] ." ".$ops[$i]." ". $values[$i] . " " . $conditions[$i] . " ";
        }
        return $this->connectionManager->fetchAll($sql);
    }

    public function paginate($columns, $values, $page, $limit, $conditions, $orderBY = "id DESC") {
        $sql = "SELECT * FROM ";
        $sql .= $this->tableName;
        if (count($columns) > 0) {
            $sql .= " WHERE ";
            // verify that the number of columns, conditions, and values are the same
            if (count($columns) != count($conditions) || count($conditions) != count($values)) {
                return false;
            }
            // Combine the columns, conditions, and values into a string
            for ($i = 0; $i < count($columns); $i++) {
                $sql .= $columns[$i] . " = '" . $values[$i] . "' " . $conditions[$i] . " ";
            }
        }
        $sql .= " ORDER BY " . $orderBY;
        $sql .= " LIMIT " . $limit . " OFFSET " . ($page - 1) * $limit;
        return $this->connectionManager->fetchAll($sql);
    }

    public function closeConnection() {
        $this->connectionManager->closeConnection();
    }
}