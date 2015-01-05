<?php namespace Cartao\controllers;

class CardController{
    
    private $CardModel;
    private $Pages;
    private $DataMap;
       
    public function __construct($DataMap) {
        $this->DataMap = $DataMap;
        $this->CardModel = New \Cartao\model\core\CardModel();
    }
       
    public function home() {
        $this->HTMLPage->setContent('home');
        return $this->HTMLPage->setPage('pageHome');
    }
    
    public  function cadastro() {
        $this->HTMLPage->setContent('cadastrar');
        return $this->HTMLPage->setPage('pageSignUp');      
    }
    
    public  function cadastroEfetuar() {
        $this->setMessageToSave($this->CardModel->save($this->arrayDadosToSave()));
        $this->HTMLPage->setContent('cadastrar');
        return $this->HTMLPage->setPage('pageSignUp');      
    }
    
    private function setMessageToSave($backOfClass) {
        if(is_int($backOfClass)){
            $this->HTMLPage->setMessageFeedBack($this->DataMap->get('message', 'registrationSucess'), true);
        }else{
            $this->HTMLPage->setMessageFeedBack($this->DataMap->get('message', 'registratioFailed'), false);
        }
    }
    
    private function arrayDadosToSave() {
       $date = $this->DataMap->get('post', 'selectDia')."-".$this->DataMap->get('post', 'selectMes')."-".$this->DataMap->get('post', 'selectAno');   
       $arrayToSave['toEmail'] = $this->DataMap->get('post', 'txtEmailDestinatario');
       $arrayToSave['toName'] = $this->DataMap->get('post', 'txtNomeDestinatario');
       $arrayToSave['fromEmail'] = $this->DataMap->get('post', 'txtEmailRemetente');
       $arrayToSave['fromName'] = $this->DataMap->get('post', 'txtNomeRemetente');
       $arrayToSave['message'] = $this->DataMap->get('post', 'txtMensagem');
       $arrayToSave['date'] = $date;
       return $arrayToSave;
    }

    public  function editar() {
        $this->HTMLPage->setContent($this->getListOfRegisters());
        return $this->HTMLPage->setPage('pageEdit');
    }
    
    public  function editarExcluir() {
        $this->deleteCards($this->DataMap->get('post', 'arrayExcluir'));
        $this->HTMLPage->setContent($this->getListOfRegisters());
        return $this->HTMLPage->setPage('pageEdit');
    }
    
    public  function editarAtualizar() {
//        echo $_GET['id'];
//        $this->CardModel->update($identifier, $value);
    }
    
    private function getListOfRegisters() {
        return $this->CardModel->select();
    }

    private function deleteCards($arrayIds) {
        for($i = 0; sizeof($arrayIds) >$i ;$i++){
            $this->CardModel->delete($arrayIds[$i]);
        }
    }
    
    public function jsonSelectAllCards(){
         echo json_encode($this->CardModel->select());
    }
            
    public function render() {
        return $this->HTMLPage->pageRender();
    }    
}
