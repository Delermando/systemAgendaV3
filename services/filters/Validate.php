<?php namespace Cartao\services\validate;
//use Symfony\Component\Validator\Validation;
//use Symfony\Component\Validator\Constraints as Assert;

class Validate {
    private $error = array();
//    private $validator;
//    private $keysForArraySave = array('fromName'=>'','fromEmail'=>'','toName'=>'','toEmail'=>'','message'=>'','date'=>'');
//    public function __construct() {
//        $this->validator = Validation::createValidatorBuilder()
//                ->addMethodMapping('loadValidatorMetadata')
//                ->getValidator();
//    }
    
    public function getError(){
        return $this->error;
    }
    
    public function getStatusValitadion(){
        return $this->checkStatusValidation();
    }
    
    public function isEmail($email){
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->error[] = 'wrongEmailFormat';
        }
    }
    private function isInt($int) {
        if(!preg_match( '/^[1-9][0-9]*$/' , $int )){
            $this->error[] = 'isNotInt';
        }
    }
    private function checkStatusValidation(){
        if(sizeof($this->error)){
            return false;
        }
        return true;
    }
    

}