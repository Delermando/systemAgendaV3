<?php
require_once("/usr/local/www/data-dist/projetos/model/core/RelationCard.php");

class RelationCardTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New \Cartao\model\core\RelationCard();
    }
    
    /**
     * @group testMakeRelationCard()
     */
    public function testMakeRelationCard() {
        $this->assertInstanceOf('RelationCard', $this->instancia);
    }     
}
