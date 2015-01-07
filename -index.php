<?php
ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

//    require_once('vendor/autoload.php');
//    require_once('controllers/control.php');
//    $CardController->render();
//    
//    echo 'pasta system agenda v3';
    require_once __DIR__ . '/vendor/autoload.php';
    
//$Validate = new Cartao\services\filters\Validate();
//use Symfony\Component\HttpFoundation\Request;
//var_dump($Validate->email('delsantos@hotmail.com.br'));

//$validator = Validation::createValidator();
//$constraint = new Assert\Email();  
//$constraint2 = new Assert\Type(array('type' => 'integer'));
//
//$input = 'delsantos@hotmail.com.br';
//$input2 = 1;
//
//$violations = $validator->validateValue($input, $constraint);
//$violations2 = $validator->validateValue($input2, $constraint2);
//var_dump($violations);
//var_dump($violations2);
//
//$request = Request::createFromGlobals();
//var_dump($request->query->get('foo'));
//echo 'pasou';
$array1 = array('a'=>1, 'b'=>2);
$array2 = array('b'=>1, 'a'=>2);

var_dump($teste);