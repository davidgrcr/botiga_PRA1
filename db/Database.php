<?php
class Database {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "botiga";
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }

    public function select($sql) {
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            return $result;
        } else {
            return false;
        }
    }

    public function close() {
        $this->conn->close();
    }

    // Iniciar una transacción
    public function beginTransaction() {
        $this->conn->begin_transaction();
    }

    // Confirmar una transacción
    public function commit() {
        $this->conn->commit();
    }

    // Revertir una transacción
    public function rollBack() {
        $this->conn->rollback();
    }

    // Método para preparar una sentencia
    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    public function delete($sql) {
        return $this->conn->query($sql);
    }

    public function insert($sql) {
        return $this->conn->query($sql);
    }

    public function getLastId() {
        return $this->conn->insert_id;
    }
}