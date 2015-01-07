<?php namespace Cartao\services\controllers;
    
class CardController  {
    private $request;
    private $arrayToSave = array();
    private $id;
    private $arrayToUpdate;
    private $card;
    public function __construct() {
        $this->card = new \Cartao\services\model\card\CardModel();
    }
    
    public function save($arrayToSave){
//        $this->arrayToSave['fromName'] = $this->request->get('fromName');
//        $this->arrayToSave['toName'] = $this->request->get('toName');
//        $this->arrayToSave['fromEmail'] = $this->request->get('fromEmail');
//        $this->arrayToSave['toEmail'] = $this->request->get('toEmail');
//        $this->arrayToSave['message'] = $this->request->get('message');
//        $this->arrayToSave['date'] = $this->request->get('date');
        return $this->card->save($arrayToSave);
    }
    

}
