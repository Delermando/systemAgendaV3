<?php namespace Cartao\services\routesController;

use Symfony\Component\HttpFoundation\Request as Request;
use Cartao\services\controllers\CardController as CardController;

class CardRoutesController{
    private $cardController;
    private $app;
    private $payload;
    
    public function __construct() {
        $this->cardController = new CardController();
    }

    public function home() {
      return 'API Agenda';
    }
    public function cardList() {
      return $this->cardController->select();
    }
    
    public function cardSave() {
        $this->constructPayload();
        return $this->cardController->save($this->payload);
    }
    
    public function cardUpdate() {
      $this->constructPayload();
      return $this->cardController->update($this->payload);
    }
    public function cardDelete($id) {
      return $this->cardController->delete($id);
    }
    private function constructPayload(){
        $request = new Request();
        $this->payload = (array)json_decode($request->getContent());
    }
}
