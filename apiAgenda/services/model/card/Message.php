<?php namespace Cartao\services\model\card;

class Message{
    private $DB;
     
    public function __construct() {
       $this->DB = new \Cartao\services\db\DBConnection();
    }
    
    public function save($message){
        return  $this->insert($message);
    }
    
    public function delete($id) {
        $delete = "DELETE FROM psnMessageToSend WHERE agnID= :id";
        $stm = $this->DB->prepare($delete);
        $stm->bindParam(":id", $id, \PDO::PARAM_INT);
        return $this->DB->runDelete($stm);       
    }
    
    public function update($column, $value, $id){
        $sql = "UPDATE psnMessageToSend SET {$column} = :value WHERE agnID = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":value", $value, \PDO::PARAM_STR);
        $stm->bindParam(":id", $id, \PDO::PARAM_INT);
        $return = $this->DB->runUpdate($stm);
        var_dump($return);
        return $return;
    }
    
    private function insert($message) {
        $sql = "INSERT INTO psnMessageToSend (agnMessage) VALUES (:message)";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":message", $message, \PDO::PARAM_STR);
        return $this->DB->runInsert($stm);
    }
    
}
