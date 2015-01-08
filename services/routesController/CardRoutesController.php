<?php namespace Cartao\services\routesController;

use Silex\Application as Application;
use Symfony\Component\HttpFoundation\Request as Request;
use Cartao\services\controllers\CardController as CardController;

class CardRoutesController{
    private $cardController;
    private $app;
    private $payload;
    
    public function __construct() {
        $this->cardController = new CardController();
        $this->app = new Application();
        $Request = new Request;
        $this->payload = (array)json_decode($Request->getContent());
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
}
