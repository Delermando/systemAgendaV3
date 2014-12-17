<?php

define('DB_HOST', '192.168.0.198');
define('DB_NAME', 'agenda');
define('DB_USER', 'agenda');
define('DB_PASS', 'agenda');


class FromEmailTest extends PHPUnit_Framework_TestCase {
   
    protected $instancia;
    
    protected function setUp(){
        $this->instancia = New \Cartao\model\core\FromEmail();
    }
    
    public function testMakeFromEmail() {
        $this->assertInstanceOf('FromEmail', $this->instancia);
    }

    
}
