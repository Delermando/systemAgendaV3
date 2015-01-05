<?php 

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

 
require_once __DIR__ . '/vendor/autoload.php';
require_once ('services/registerGlobals/globals.php');


$CardModel = New \Cartao\model\card\CardModel();
//$CardModel->save($arrayToSave);
//$CardModel->update($identifier, $value)
//$CardModel->delete($IdSchedule);
//var_dump($CardModel->select());
// 
//$app = new Silex\Application();
//$app['debug'] = true;
//
//$app->get('/v1/cards/list', function () use ($app, $CardModel){
//    return $app->json($CardModel->select());
//});
//
//$app->run();

//echo 'passou';