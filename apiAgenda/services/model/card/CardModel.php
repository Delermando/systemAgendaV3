<?php namespace Cartao\services\model\card;


class CardModel{
    private $FromEmail = 'FromEmail';
    private $ToEmail = 'ToEmail';
    private $Message = 'Message';
    private $RelationCard = 'RelationCard';
    
    public function save($arrayToSave) {
        return $this->saveInAllEntities($arrayToSave);
    }
    
    public function delete($IdSchedule) {
        $arrayListID = $this->instanceSelectIDsToDeleteRelationCard($IdSchedule);
        if(sizeof($arrayListID) > 0){
            $arrayListID[0]['IDSchedule'] = $IdSchedule;
            return $this->deleteInAllEntities($arrayListID[0]);
        }
    }
    
    public function update($arrayDataForUpdate) {
        return $this->chooseInstanceForUpdate($arrayDataForUpdate);
    }
    
    public function select() {
        return $this->instanceSelectRelationCard();
    }
    
    private function saveInAllEntities($arrayDataToInsert) {
        $idFromEmail = $this->instanceSaveFromEmail($arrayDataToInsert['fromName'], $arrayDataToInsert['fromEmail']);
        $idToEmail = $this->instanceSaveToEmail($arrayDataToInsert['toName'], $arrayDataToInsert['toEmail']);
        $idMessage = $this->instanceSaveMessage($arrayDataToInsert['message']);
        return $this->instanceSaveRelationCard($idFromEmail, $idToEmail, $idMessage, $arrayDataToInsert['date']);
    }

    private function deleteInAllEntities($arrayDelete) {
        $return  = array('numbOfLinesAffected' => $this->instanceDeleteRelationCard($arrayDelete['IDSchedule']));
        $this->deleteFromEmailIfIsUnic($arrayDelete['IDFromEmail']);
        $this->deleteToEmailIfIsUnic($arrayDelete['IDToEmail']);
        $this->instanceDeleteMessage($arrayDelete['IDMessage']);
        return $return;
    } 
    
    private function instanceSaveFromEmail($name, $email) {
        return $this->chooseInstance($this->FromEmail)->save($name, $email);
    }
    private function instanceDeleteFromEmail($id) {
        return $this->chooseInstance($this->FromEmail)->delete($id);
    }
    private function instanceUpdateFromEmail($column, $value, $id) {
        return $this->chooseInstance($this->FromEmail)->update($column, $value, $id);
    } 
    
    private function instanceSaveToEmail($name, $email) {
        return $this->chooseInstance($this->ToEmail)->save($name, $email);
    }
    private function instanceDeleteToEmail($id) {
        return $this->chooseInstance($this->ToEmail)->delete($id);
    }
    private function instanceUpdateToEmail($column, $value, $id) {
        return $this->chooseInstance($this->ToEmail)->update($column, $value, $id);
    }
    
    
    private function instanceSaveMessage($messageToInsert) {
        return $this->chooseInstance($this->Message)->save($messageToInsert);
    }
    private function instanceDeleteMessage($id) {
        return $this->chooseInstance($this->Message)->delete($id);
    }
    private function instanceUpdateMessage($column, $value, $id) {
        return $this->chooseInstance($this->Message)->update($column, $value, $id);
    }

    
    private function instanceSaveRelationCard($idFromEmail, $idToEmail, $idMessage, $dataEnvio) {
        return $this->chooseInstance($this->RelationCard)->save($idFromEmail, $idToEmail, $idMessage, $dataEnvio);
    }
    private function instanceDeleteRelationCard($id) {
        return $this->chooseInstance($this->RelationCard)->delete($id);
    }
    private function instanceSelecCountIDIsnFromEmail($id) {
        return $this->chooseInstance($this->RelationCard)->selecCountIDsInFromEmail($id);
    }
    private function instanceSelecCountIDIsnToEmail($id) {
        return $this->chooseInstance($this->RelationCard)->selecCountIDsInToEmail($id);
    }
    private function instanceSelectRelationCard() {
        return $this->chooseInstance($this->RelationCard)->selectAllRegisters();
    }
    private function instanceSelectIDsToDeleteRelationCard($id) {
        return $this->chooseInstance($this->RelationCard)->selectIDsToDelete($id);
    }
    
    
    private function deleteFromEmailIfIsUnic($id) {
        $fromEmail = $this->instanceSelecCountIDIsnFromEmail($id);
        if($fromEmail[0]['repeated'] == 0){
            $this->instanceDeleteFromEmail($id);
        }
    }
    private function deleteToEmailIfIsUnic($id) {
        $toEmail = $this->instanceSelecCountIDIsnToEmail($id);
        if($toEmail[0]['repeated'] == 0){
            $this->instanceDeleteToEmail($id);
        }
    }
    
    private function chooseInstanceForUpdate($arrayDataForUpdate) {
       switch ($arrayDataForUpdate['table']){
           case "psnFromEmail":
               return $this->instanceUpdateFromEmail($arrayDataForUpdate['column'], $arrayDataForUpdate['value'], $arrayDataForUpdate['id']);
               break;
           case "psnToEmail":
               return $this->instanceUpdateToEmail($arrayDataForUpdate['column'], $arrayDataForUpdate['value'], $arrayDataForUpdate['id']);
               break;
           case "psnMessageToSend":
              return $this->instanceUpdateMessage($arrayDataForUpdate['column'], $arrayDataForUpdate['value'], $arrayDataForUpdate['id']);
               break;
           default :
               return false;
       }
    }
    
    private function chooseInstance($className) {
        $mountClass = "\Cartao\\services\\model\\card\\".$className;
        return new $mountClass();
    }

}