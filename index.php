<?php

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

require_once __DIR__ . '/vendor/autoload.php';
require_once ('services/registerGlobals/globals.php');

use \Symfony\Component\HttpFoundation\Request as request;

$CardController = New \Cartao\services\controllers\CardController();
$CardModel = New \Cartao\services\model\card\CardModel();

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/v1/cards', function (request $request) use ($app, $CardModel) {
    return $app->json($CardModel->select());
});

$app->put('/v1/cards', function (request $request) use ($app, $CardModel) {
    $arrayToUpdate['table'] = $request->get('table');
    $arrayToUpdate['column'] = $request->get('column');
    $arrayToUpdate['value'] = $request->get('value');
    $arrayToUpdate['id'] = $request->get('id');
    return $app->json($CardModel->update($arrayToUpdate));
});

$app->delete('/v1/cards', function (request $request) use ($app, $CardModel) {
    return $app->json($CardModel->delete($request->get('idCard')));
});

$app->post('/v1/cards', function (request $request) use ($app, $CardModel) {
    $arrayToSave['fromName'] = $request->get('fromName');
    $arrayToSave['toName'] = $request->get('toName');
    $arrayToSave['fromEmail'] = $request->get('fromEmail');
    $arrayToSave['toEmail'] = $request->get('toEmail');
    $arrayToSave['message'] = $request->get('message');
    $arrayToSave['date'] = $request->get('date');
    return $app->json($CardModel->save($arrayToSave));
});

$app->run();




