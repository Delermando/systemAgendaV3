<?php namespace Cartao\model\router;

class Router extends \Cartao\controllers\CardController{
    private $router;
    private $action;
    private $interactor;
    
    public function __construct($action, $Interactor) {
        $this->action = $action;
        $this->interactor = $Interactor;
    }
    
    public function set($router, $interactorName = '') {
        $this->router = $router;
        return $this->executeInteractor($interactorName);
    }
    
    private function executeInteractor($interactorName) {
        if($this->compareRoute()){
            return $this->interactor->$interactorName();
        }else{
            return false;
        }
        
    }

    private function compareRoute(){
        $retorno = false;
        if($this->action === $this->router){
             return true;
        }else{
            return false;
        }       
    }
//    
}