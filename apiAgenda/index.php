<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

require_once __DIR__ . '/vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

require_once ('services/routes/cardRoutes.php');

$app->run();
