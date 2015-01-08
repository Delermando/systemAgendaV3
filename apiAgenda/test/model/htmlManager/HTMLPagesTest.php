<?php

class HTMLPagesTest extends PHPUnit_Framework_TestCase {
    protected $instancia;

    protected function setUp(){
        $this->instancia = New Cartao\model\htmlManager\HTMLPages('teste');
    }
    
    /**
     * @group testMakeHTMLPages
     */
    public function testMakeHTMLPages() {
        $this->assertInstanceOf('Cartao\model\htmlManager\HTMLPages', $this->instancia);
    }
}