<?php namespace Cartao\registerGlobals;

class DataMap {

    private $html;
    private $css;
    private $js;
    private $title;
    private $message;
    public $get;
    public $post;

    public function get($dataType, $key) {
        if($this->isArray($this->$dataType)){
            $return = $this->testKeyExist($this->$dataType, $key);
        }else{
            return false;
        }
        return $return;
    }
    
    public function addHTMLFile($path, $arrayHTMLFile) {
        if ($this->isArray($arrayHTMLFile)) {
            $this->html = $this->constructArray($path, $arrayHTMLFile, 'php');
            return true;
        }
        return false;
    }

    public function addCSSFile($path, $arrayCSSLFile) {
        if ($this->isArray($arrayCSSLFile)) {
            $this->css = $this->constructArray($path, $arrayCSSLFile, 'css');
            $this->css = $this->wrapPath('<link type="text/css" rel="stylesheet" href="%s" />', $this->css);
            return true;
        }
        return false;
    }

    public function addJSLFile($path, $arrayJSFile) {
        if ($this->isArray($arrayJSFile)) {
            $this->js = $this->constructArray($path, $arrayJSFile, 'js');
            $this->js = $this->wrapPath('<script type="text/javascript" lang="javascript" src="%s"></script>', $this->js);
            return true;
        }
        return false;
    }

    public function addTitle($arrayTitle) {
        $this->title = $arrayTitle;
        return true;
    }
    public function addSystemMessage($arraySystemMessages) {
        $this->message = $arraySystemMessages;
        return true;
    }
    public function addVarGET($varGET) {
        $this->get = $this->setVarGET($varGET);
        return true;
    }
    
    public function addVarPOST($varPOST) {
       return $this->post = $this->setVarPOST($varPOST);
//       return true;
    }
    
    private function constructArray($path, $arrayToAdd, $fileType) {
        return array_combine($arrayToAdd, array_map(function($fileName) use ($path, $fileType) {
                    return sprintf($path, $fileName . '.' . $fileType);
                }, $arrayToAdd));
    }
    private function wrapPath($format, $arrayPaths) {
        $values = array_values($arrayPaths);
        $keys = array_keys($arrayPaths);
        $values  = array_map(function ($path) use ($format){
            return  sprintf($format, $path);
        }, $arrayPaths);
        return array_combine($keys, $values);
    }

    private function isArray($varInto) {
        if (is_array($varInto)) {
            return true;
        }
        return false;
    }

    private function testKeyExist($array, $key) {
        if (array_key_exists($key, $array)) {
            return $array[$key];
        }
        return array('wrongName');
    }
       
    private function setVarGET($arrayVars){
        for ($a = 0; sizeof($arrayVars) > $a; $a++) {
            if (!isset($_GET[$arrayVars[$a]])) {
                $arrayVarsOUT[$a] = "";
            } else {                   
                $arrayVarsOUT[$a] = $this->setStrings($_GET[$arrayVars[$a]]);
            }
        }
        return array_combine($arrayVars, $arrayVarsOUT);
    }
    
    private function setVarPOST($arrayVars){
        for ($a = 0; sizeof($arrayVars) > $a; $a++) {
            if (!isset($_POST[$arrayVars[$a]])) {
                $arrayVarsOUT[$a] = "";
            } else {                   
                $arrayVarsOUT[$a] = $this->setStrings($_POST[$arrayVars[$a]]);
            }
        }
        return array_combine($arrayVars, $arrayVarsOUT);
    }
    
    private function setStrings($string) {
        if(is_string($string)){
            $return = addslashes(trim($string));
        }else{
            $return = $string;
        }
        return $return;
    }

    
    public static function varIsSet($arrayAssocVarIn = false) {
        if (is_array($arrayAssocVarIn) !== false) {
            $qtdIndices = sizeof($arrayAssocVarIn);
            for ($a = 0; $qtdIndices > $a; $a++) {
                if (!isset($GLOBALS[$arrayAssocVarIn[$a]])) {
                    $retorno[$arrayAssocVarIn[$a]] = "";
                }
            }
        }
        return $retorno;
    }
}
