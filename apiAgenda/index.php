<?php

ob_start();
session_start();


//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Methods: *");
//header("Access-Control-Allow-Headers: x-requested-with, Content-Type, origin, authorization, accept, client-security-token");
//header('Content-type: application/json');   
//header('Content-Type: text/html; charset=utf-8');


ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

require_once __DIR__ . '/vendor/autoload.php';

use JDesrosiers\Silex\Provider\CorsServiceProvider;

$app = new Silex\Application();
$app['debug'] = true;
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

//$app->register(new CorsServiceProvider, array(
//    "cors.allowOrigin" => "*",
//    "cors.allowMethods" => "GET, PUT, POST, DELETE, OPTIONS"
//));
//
//$app->after($app["cors"]);


//$app->after(function (Request $request, Response $response) {
////    $response->headers->set('Access-Control-Allow-Origin', '*');
////    $response->headers->set('Access-Control-Allow-Headers', 'X-CSRF-Token, X-Requested-With, Accept, Accept-Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version, Origin');
//    $response->headers->set('Allow', 'GET, PUT, POST, DELETE, OPTIONS');
//});

require_once ('services/routes/cardRoutes.php');

$app->run();
