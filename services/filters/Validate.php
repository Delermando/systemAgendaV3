<?php namespace Cartao\services\filters;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class Validate {
    private $validator;
    private $keysForArraySave = array('fromName'=>'','fromEmail'=>'','toName'=>'','toEmail'=>'','message'=>'','date'=>'');
    private $error = array();
    public function __construct() {
        $this->validator = Validation::createValidatorBuilder()
                ->addMethodMapping('loadValidatorMetadata')
                ->getValidator();
    }
    
    public function validateArrayValuesToSaveCard($array){
        $this->validateArrayValuesToSaveCard($array);
    }
    
    public function isInteger($mail){
        $teste =  $this->validator->validateValue($mail, new Assert\Email());
        return sizeof($teste);
    }
    
    public function compareArrayKeys($arrayToCompare){
        $diff = array_diff_key($arrayToCompare, $this->keysForArraySave);
        if(empty($diff)){
            $this->error = true;
        }
    }
}