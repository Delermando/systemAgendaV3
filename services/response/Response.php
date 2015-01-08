<?php namespace Cartao\services\response;

class Response{
    private $return = array();
    public $message = array();
    public $data;
    public $status = true;
    
    public function json(){
        $this->return['response'] = $this->response();
        $this->return['message'] = $this->message();
        $this->return['data'] = $this->data();
        return json_encode($this->return);
    }
    
    private function response(){
        if($this->status){
            return 'sucess';
        }
        return 'failed';
    }
    
    private function message(){
        $toCompare = array(null, "", " ");
        if(!in_array($this->message, $toCompare)){
            return $this->message;
        }
        return 'no error';
    }
    
    private function data(){
        $toCompare = array(null, "", " ");
        if(!in_array($this->data, $toCompare)){
            return $this->data;
        }
        return 'no data';
    }
}