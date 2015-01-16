<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

require_once __DIR__ . '/vendor/autoload.php';
use Swagger\Annotations as SWG;




$app = new Silex\Application();
$app['debug'] = true;
$app->register(new Silex\Provider\ServiceControllerServiceProvider());


$app->register(new JDesrosiers\Silex\Provider\SwaggerServiceProvider(), array(
    "swagger.srcDir" => __DIR__ . "/vendor/zircote/swagger-php/library",
    "swagger.servicePath" => __DIR__ . "/",
));


$app->register(new SwaggerUI\Silex\Provider\SwaggerUIServiceProvider(), array(
    'swaggerui.path'       => '/doc',
    'swaggerui.apiDocPath' => '/docs'
));
        


require_once ('services/routes/cardRoutes.php');

$app->run();
