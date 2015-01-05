<?php 

class CardControllerTest extends PHPUnit_Framework_TestCase {
    protected $instancia;

     protected function setUp(){
        $this->instancia = New \Cartao\controllers\CardController();
    }
            
  public function testMakeCardControl() {
       $this->assertInstanceOf('CardControl', $this->instancia);
  }
  
  public function testSaveCard(){
      $cartao = new CartoesControl();
      $this->assertEquals(true,$cartao->create());
  }
  


}
