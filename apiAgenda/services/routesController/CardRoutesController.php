<?php namespace Cartao\services\routesController;

use Symfony\Component\HttpFoundation\Request as Request;
use Cartao\services\controllers\CardController as CardController;

class CardRoutesController{
    private $cardController;
    private $app;
    private $payload;
    
    public function __construct(Request $request) {
        $this->cardController = new CardController();
//        $this->payload = $this->constructPayload($request);
    }

    public function cardList() {
      return $this->cardController->select();
    }
    
    public function cardSave() {
        $this->constructPayload($request);
        return $this->cardController->save($this->payload);
    }
    
    public function cardUpdate() {
      $this->constructPayload($request);
      return $this->cardController->update($this->payload);
    }
    public function cardDelete($id) {
      return $this->cardController->delete($id);
    }
    private function constructPayload(Request $request){
        return (array)json_decode($request->getContent());
    }
}
