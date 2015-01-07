<?php

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

require_once __DIR__ . '/vendor/autoload.php';
require_once ('services/registerGlobals/globals.php');

use \Symfony\Component\HttpFoundation\Request as Request;
use \Cartao\services\model\card\CardModel as CardModel;

$CardModel = new CardModel();
$Request = new Request();
$payload = (object) json_decode($Request->getContent());

$app = new Silex\Application();
$app['debug'] = true;

$app->get('/v1/cards', function () use ($app, $CardModel, $payload) {
    return $app->json($CardModel->select());
});

$app->put('/v1/cards', function () use ($app, $CardModel, $payload) {
    $arrayToUpdate['table'] = $payload->table;
    $arrayToUpdate['column'] = $payload->column;
    $arrayToUpdate['value'] = $payload->value;
    $arrayToUpdate['id'] = $payload->id;
    return $app->json($CardModel->update($arrayToUpdate));
});

$app->delete('/v1/cards', function () use ($app, $CardModel, $payload) {
    return $app->json($CardModel->delete($payload->idCard));
});

$app->post('/v1/cards', function () use ($app, $CardModel, $payload) {
    $arrayToSave['fromName'] = $payload->fromName;
    $arrayToSave['toName'] = $payload->toName;
    $arrayToSave['fromEmail'] = $payload->fromEmail;
    $arrayToSave['toEmail'] = $payload->toEmail;
    $arrayToSave['message'] = $payload->message;
    $arrayToSave['date'] = $payload->date;
    return $app->json($CardModel->save($arrayToSave));
});

$app->run();
