<?php

class FiltersTest extends PHPUnit_Framework_TestCase {
    
    protected $instancia;
        
    protected function setUp(){
        $this->instancia = New \Cartao\filters\Filters() ;
    }

    
    /**
     * @group testMakeFilters
     */
    public function testMakeFilters() {
        $this->assertInstanceOf('\Cartao\filters\Filters', $this->instancia);
    }

    
    /**
     * @group testIfArrayToSaveIsInTheFormat
     * @dataProvider dataForIfArrayToSaveIsInTheFormat
     */
    public function testIfArrayToSaveIsInTheFormat($expected, $data) {
        $this->assertEquals($expected, $this->instancia->setArrayToSave($data));
    }
    public function dataForIfArrayToSaveIsInTheFormat() {
         return array(
            array(array('toEmail' => 'delsantos@hotmail.com.br',
                            'toName'=>'testName',
                            'fromEmail'=>'d.santos@personare.com.br',
                            'fromName'=>'testName',
                            'message'=>'testMessage',
                            'date'=>'24-01-1999'),
                 array('toEmail' => 'delsantos@hotmail.com.br',
                            'toName'=>'testName',
                            'fromEmail'=>'d.santos@personare.com.br',
                            'fromName'=>'testName',
                            'message'=>'testMessage',
                            'date'=>'24-01-1999')), 
             
            array(array('keysCompare' => false), array('Email' => 'delsantoshotmail.com.br',
                            'toName'=>'testName',
                            'fromEmail'=>'d.santos@personare.com.br',
                            'fromName'=>'testName',
                            'message'=>'testMessage',
                            'date'=>'24-01-1999')),   
             
            array(array('valuesIsSet' => false), array('toEmail' => '',
                            'toName'=>'testName',
                            'fromEmail'=>'d.santos@personare.com.br',
                            'fromName'=>'testName',
                            'message'=>'testMessage',
                            'date'=>'24-01-1999')), 
             
            array(array('toEmail' => false), array('toEmail' => 'delsantoshotmail.com.br',
                            'toName'=>'testName',
                            'fromEmail'=>'d.santos@personare.com.br',
                            'fromName'=>'testName',
                            'message'=>'testMessage',
                            'date'=>'24-01-1999')), 
             
            array(array('fromEmail' => false), array('toEmail' => 'd.santos@personare.com.br',
                            'toName'=>'testName',
                            'fromEmail'=>'delsantos@hotmail',
                            'fromName'=>'testName',
                            'message'=>'testMessage',
                            'date'=>'24-01-1999')), 
             
            array(array('date' => false), array('toEmail' => 'delsantos@hotmail.com.br',
                            'toName'=>'testName',
                            'fromEmail'=>'d.santos@personare.com.br',
                            'fromName'=>'testName',
                            'message'=>'testMessage',
                            'date'=>'s24-01-1999')), 
        );
    }
    
    
    /**
     * @group testIfIsEmail
     * @dataProvider dataForIfIsEmail
     */
    public function testIfIsEmail($expected, $data) {
        $this->assertEquals($expected, $this->instancia->checkIfIsEmail($data));
    }
    public function dataForIfIsEmail() {
         return array(
            array(true, 'delsantos@hotmail.com.br'), 
            array(true, 'delsantos@hotmail.com'), 
            array(true, '123delsantos@hotmail.com.br'), 
            array(false, 'delsantos@hotmail'), 
            array(false, 'delsantos@hotmail.123'), 
            array(false, '@#$%¨delsantos@hotmail.com.br'), 
            array(false, '123delsantos@hotmail_com'), 
        );
    }
    
    
    /**
     * @group testIfIsDate
     * @dataProvider dataForIfIsDate
     */
    public function testIfIsDate($expected, $data) {
        $this->assertEquals($expected, $this->instancia->checkIfIsDate($data));
    }
    public function dataForIfIsDate() {
         return array(
            array(true, '24-01-1992'), 
            array(false, 's24-01-1992'), 
            array(false, '24-0s1-1992'), 
            array(false, '24-0s1-1992s'), 
            array(false, '424-01-1992s'), 
            array(false, '24-101-1992s'), 
            array(false, '24-01-11992'), 
            array(false, '24-01-11992'), 
            array(false, ''), 
            array(false, ' '), 
            array(false, ' asdasd '), 
            array(false, 12), 
        );
    }
    
    /**
     * @group testIfIsSet
     * @dataProvider dataForTestIfIsSet
     */
    
    public function testIfIsSet($expected, $data) {
        $this->assertEquals($expected,$this->instancia->checkIfIsSet($data));
    }
    public function dataForTestIfIsSet() {
        return array(
            array(true, true), 
            array(true, 1),
            array(true, false), 
            array(true, 0), 
            array(true, 235),
            array(true, 1.000),
            array(true, -3),
            array(true, 1.200),
            array(true, 0.1),
            array(true, 'teste'),
            array(false, null),
            array(false, ''),
            array(false, ' '),
        );
    }
    
    
    /**
     * @group testTrueIfIsInt
     * @dataProvider dataForTestIfIsInt
     */
    public function testIfIsInt($expected, $data) {
        $this->assertEquals($expected,$this->instancia->checkIfIsInt($data));
    }
    public function dataForTestIfIsInt()
    {
        return array(
            array(true, true), 
            array(true, 1),
            array(true, 235),
            array(true, 1.000),
            array(false, false),  
            array(false, 0), 
            array(false, null),
            array(false, -3),
            array(false, 1.200),
            array(false, 0.1),
            array(false, ''),
            array(false, ' '),
            array(false, 'teste'),
        );
        
    }
    
    /**
     * @group testGetIdColumAndTableFromIdetifier
     * @dataProvider dataForGetIdColumAndTableFromIdetifier
     */
    public function testGetIdColumAndTableFromIdetifier($expected, $data) {
        $this->assertEquals($expected, $this->instancia->getIdColumAndTableFromIdetifier    ($data));
    }
    public function dataForGetIdColumAndTableFromIdetifier() {
         return array(
            array(array('id'=>'10','table'=>'psnFromEmail','column'=>'agnEmail'), '10-fe:ae'), 
            array(array('id'=>'10','table'=>'psnFromEmail','column'=>'agnName'), '10-fe:an'), 
            array(array('id'=>'10','table'=>'psnToEmail','column'=>'agnEmail'), '10-te:ae'), 
            array(array('id'=>'10','table'=>'psnToEmail','column'=>'agnName'), '10-te:an'), 
            array(array('id'=>'10','table'=>'psnMessageToSend','column'=>'agnMessage'), '10-ms:am'), 
            array(array('id'=>'10','table'=>'psnScheduleSend','column'=>'agnDateToSend'), '10-ss:ds'), 
            array(false, 's10-ss:ds'), 
            array(false, '-ss:ds'), 
            array(false, '10-sss:ds'), 
        );
    }
}