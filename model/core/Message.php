<?php namespace Cartao\model\core;

class Message{
     private $DB;
     
     public function __construct() {
        $this->DB = new \Cartao\model\db\DBConnection();
    }
    
    public function save($message){
        return  $this->insert($message);
    }
    
    public function delete($id) {
        $delete = "DELETE FROM psnMessageToSend WHERE agnID= :id";
        $stm = $this->DB->prepare($delete);
        $stm->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->DB->runQuery($stm);       
        return $this->testDelete($stm->rowCount());
    }
    
    public function update($column, $value, $id){
        $sql = "UPDATE psnMessageToSend SET {$column} = :value WHERE agnID = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":value", $value, \PDO::PARAM_STR);
        $stm->bindParam(":id", $id, \PDO::PARAM_INT);
        return $this->DB->runQuery($stm);
    }
    
    private function insert($message) {
        $sql = "INSERT INTO psnMessageToSend (agnMessage) VALUES (:message)";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":message", $message, \PDO::PARAM_STR);
        $this->DB->runQuery($stm);
        return intval($this->DB->lastIdOnInsert());
    }
    
    private function testDelete($rowDelete) {
        if($rowDelete == 1){
            return true;
        }
        return false;
    }
}
