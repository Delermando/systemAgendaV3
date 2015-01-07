<?php namespace Cartao\services\db;

class DBConnection {
    private $conn;
    
    public function __construct() {
        return $this->Connect();
    }
    
    private function Connect() {
        try {
            $this->conn = new \PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
            $this->conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES,TRUE);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $this->conn;
    }

    public function prepare($sql) {
        return $this->Connect()->prepare($sql);
    }

    public function runInsert($stm) {
        $stm->execute();
        return intval($this->conn->lastInsertId());
    }
    
    public function runUpdate($stm) {
        $stm->execute();
        return $stm->rowCount();
    }
    
    public function runDelete($stm) {
        $stm->execute();
        return $stm->rowCount();
    }

    public function runSelect($stm) {
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }
    
}
