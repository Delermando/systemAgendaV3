<?php namespace Cartao\services\validate;

class Validate {
    private $error = array();
    
    public function getError(){
        return $this->error;
    }
    
    public function getStatusValitadion(){
        return $this->checkStatusValidation();
    }
    
    public function isEmail($arrayValues, $keyToOfValueToTest){
        if(!filter_var($arrayValues[$keyToOfValueToTest], FILTER_VALIDATE_EMAIL)){
            $this->error[] = array($keyToOfValueToTest => 'wrongEmailFormat');
        }
    }
    public function isInt($int) {
        if(!preg_match( '/^[1-9][0-9]*$/' , $int )){
            $this->error[] = 'isNotInt';
        }
    }
    
    public function updateReturn($updateReturn){
        if($updateReturn === 0){
            $this->error[] = 'noDiferentDataToUpdate';
        }else{
            return array('numbOfLinesAffected' =>$updateReturn);
        }
    }
    public function checkNumbOfRegisters($registers){
        if(count($registers) < 1){
            $this->error[] = 'noRegisters';
        }
    }

    private function checkStatusValidation(){
        if(sizeof($this->error)){
            return false;
        }
        return true;
    }
    

}