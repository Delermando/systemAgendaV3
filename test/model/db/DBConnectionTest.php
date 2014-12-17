<?php

class DBConnectionTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New Cartao\model\db\DBConnection();
    }
    
    /**
     * @group testMakeDBConnection
     */
    public function testMakeclassNameToTest () {
        $this->assertInstanceOf('DBConnection', $this->instancia);
    }

}
