<?php namespace Cartao\filters;

class Filters {
    
    private $arrayBaseToInsert = array('toEmail' => '', 'toName' => '', 'fromEmail' => '', 'fromName' => '', 'message' => '', 'date' => '');
    private $arrayTablesAndColumns = array(
            'fe:ae' => array('psnFromEmail', 'agnEmail'),
            'fe:an' => array('psnFromEmail', 'agnName'),
            'te:ae' => array('psnToEmail', 'agnEmail'),
            'te:an' => array('psnToEmail', 'agnName'),
            'ms:am' => array('psnMessageToSend', 'agnMessage'),
//            'ss:ds' => array('psnScheduleSend', 'agnDateToSend')
        );
    private $arrayToSave;

    public function setArrayToSave($array) {
        $return = $this->checkIfAllVerificationsIsToSaveIsTrue($array);
        if($return === true){
            return $this->arrayToSave = $array;
        }
        return $return;
    }
    public function checkIfIsSet($var) {
        if ($var !== "" && $var !== " " && $var !== null) {
            return true;
        }
        return false;
    }

    public function checkIfIsEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }else{
            return false;
        }
        return true;
    }
    
    public function checkIfIsInt($int) {
        if(preg_match( '/^[1-9][0-9]*$/' , $int )){
            return true;
        }
        return false;
    }

    public function checkIfIsDate($date) {
        $regexTesteDate = "~^\d{2}-\d{2}-\d{4}$~";
        $testRegex = filter_var(
            $date,FILTER_VALIDATE_REGEXP,
            array("options"=>array("regexp"=> $regexTesteDate))
        );
        
        if($testRegex !== false){
            return true;
        }
        return false;      
    }
    
    public function getIdColumAndTableFromIdetifier($identifier) {
        $arrayIdAndTableColumn = $this->testAllVerificationsByIdentifier($identifier);
        if($arrayIdAndTableColumn){
            $extracted = $this->extractColunAndTableFromIndenfier($arrayIdAndTableColumn[1]);
            return array('id'=>$arrayIdAndTableColumn[0], 'table' => $extracted['table'], 'column' => $extracted['column']);
        }
        return false;
    }
    
    private function testAllVerificationsByIdentifier($identifier) {
        $arrayIdentifierAndId = $this->testFormatIdentifier($identifier);
        if($arrayIdentifierAndId!== false){
             $status[] = $this->checkIfIsInt($arrayIdentifierAndId[0]);
             $status[] = $this->testIdentifierExist($arrayIdentifierAndId[1]);
        }else{
            return false;
        }
        if(array_search(false, $status) === false){
            return $arrayIdentifierAndId;
        }
        return false;
    }


    private function testFormatIdentifier($identifier) {
        $array = explode('-', $identifier);
        if(sizeof($array) == 2){
            return $array;
        }else{
            return false;
        }
    }

    
    private function extractColunAndTableFromIndenfier($identifier) {
        return array('table'=>$this->arrayTablesAndColumns[$identifier][0], 
                    'column'=>$this->arrayTablesAndColumns[$identifier][1]);
    }
    
    private function testIdentifierExist($identifierTableColumn) {
        $identifierList = array_keys($this->arrayTablesAndColumns);
        $statusTestExist = array_search($identifierTableColumn, $identifierList);
        if($statusTestExist === false){
            return false;
        }
        return true;
    }
    
    private function checkIfAllVerificationsIsToSaveIsTrue($array) {
       $return = true;
       $status['keysCompare'] = $this->compareArrayKeysExternWithIntern($array);
       if($status['keysCompare']){
            $status['valuesIsSet'] = $this->testArrayIfAllIsSet($array);
            $status['toEmail'] = $this->checkIfIsEmail($array['toEmail']);
            $status['fromEmail'] = $this->checkIfIsEmail($array['fromEmail']);
            $status['date'] = $this->checkIfIsDate($array['date']);
            $searchErro = array_search(false, $status);
            if(!$searchErro == false){
                $return = array($searchErro => false);
            }
       }else{
           $return = $status;
       }
       return $return;
    }

    private function testArrayIfAllIsSet($array) {
        $keysExter = array_keys($array);
        for($i=0; sizeof($array) > $i; $i++){
            if(!$this->checkIfIsSet($array[$keysExter[$i]])){
                return false;       
            }
        }
        return true;
    }

    private function compareArrayKeysExternWithIntern($array) {
        $keysExter = array_keys($array);
        $keysIntern = array_keys($this->arrayBaseToInsert);
        for($i=0; sizeof($keysIntern) > $i; $i++){
            if(!$this->checkIfIsEqual($keysIntern[$i], $keysExter[$i])){
                return false;       
            }
        }
        return true;
    }
    
    private function checkIfIsEqual($var1, $var2) {
        if ($var1 == $var2) {
            return true;
        }
        return false;
    }
}
