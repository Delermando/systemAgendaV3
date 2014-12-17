<?php

class RouterTest extends PHPUnit_Framework_TestCase {
    protected $instancia;

    protected function setUp(){
        $this->instancia = New \Cartao\model\router\Router('teste', 'teste');
    }
    
    /**
     * @group testMakeRouter
     */
    public function testMakeRouter() {
        $this->assertInstanceOf('\Cartao\model\router\Router', $this->instancia);
    }
}
