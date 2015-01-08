<?php namespace Cartao\services\routesController;

use Symfony\Component\HttpFoundation\Request as Request;
use Cartao\services\controllers\CardController as CardController;

class CardRoutesController{
    private $cardController;
    private $app;
    private $payload;
    
    public function __construct() {
        $this->cardController = new CardController();
        $this->payload = $this->constructPayload();
    }

    public function cardList() {
      return $this->cardController->select();
    }
    
    public function cardSave() {
        return $this->cardController->save($this->payload);
    }
    
    public function cardUpdate() {
      return $this->cardController->update($this->payload);
    }
    public function cardDelete() {
      return $this->cardController->delete($this->payload['idCard']);
    }
    private function constructPayload(){
        $Request = new Request;
        return (array)json_decode($Request->getContent());
    }
}
