<?php

class DataMapTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;

    protected function setUp(){
        $this->instancia = New \Cartao\model\dataRepository\DataMap() ;
    }
    
    /**
     * @group testMakeDataMap
     */
    public function testMakeDataMap () {
        $this->assertInstanceOf('DataMap', $this->instancia);
    }
    
    /**
    * @group testGet
    * @dataProvider dataForGet
    */
      public function testGet($expectec, $dataType, $key) {
        $pathHTML = '../../views/html/%s';
        $arrayPathHTMLFiles = array('home','teste');
        $this->instancia->addHTMLFile($pathHTML, $arrayPathHTMLFiles);
        $this->assertEquals($expectec, $this->instancia->get($dataType, $key));
    }
    public function dataForGet() {
         return array(
            array('../../views/html/home.php', 'html', 'home'), 
            array(array('wrongName'), 'html', 'homes'), 
            array(array('fileNotExist'), 'html', 'teste'), 
        );
    }
       
}