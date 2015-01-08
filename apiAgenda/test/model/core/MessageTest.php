<?php
require_once("/usr/local/www/data-dist/projetos/model/core/Message.php");

class MessageTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New Cartao\model\core\Message();
    }
    
    /**
     * @group testMakeMessage()
     */
    public function testMakeMessage() {
        $this->assertInstanceOf('Message', $this->instancia);
    }     
}
