<?php

class HTMLStructureTest extends PHPUnit_Framework_TestCase {
    protected $instancia;

    protected function setUp(){
        $this->instancia = New \Cartao\model\htmlManager\HTMLStructure();
    }
    
    /**
     * @group testMakeHTMLStructure
     */
    public function testMakeHTMLStructure() {
        $this->assertInstanceOf('\Cartao\model\htmlManager\HTMLStructure', $this->instancia);
    }
}
