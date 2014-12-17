<?php
require_once("/usr/local/www/data-dist/projetos/model/core/ToEmail.php");

class ToEmailTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New \Cartao\model\core\ToEmail();
    }
    
    /**
     * @group testMakeToEmail()
     */
    public function testMakeToEmail() {
        $this->assertInstanceOf('ToEmail', $this->instancia);
    }     
}
