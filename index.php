<?php 

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

 
require_once __DIR__ . '/vendor/autoload.php';
 
$app = new Silex\Application();
$app['debug'] = true;
$blogPosts = array(
    1 => array(
        'date' => '2014-10-10',
        'author' => 'Delermando',
        'title' => 'Usando Silex 01',
        'body' => 'Post 1'
    ),
    2 => array(
        'date' => '2014-11-10',
        'author' => 'Salmo',
        'title' => 'Usando Silex 02',
        'body' => 'Post 2'
    ),
    'd' => array(
        'date' => '2014-11-10',
        'author' => 'teste filtro',
        'title' => 'Usando Silex 03',
        'body' => 'Post 3'
    ),
);
 
$app->get('/', function () use ($app){
    $return  = "Bem vindo, começamos a usar o Silex";
    return $app->json($return);
});
 
$app->get('/blog', function () use ($blogPosts, $app) {
    $return = '';
    foreach ($blogPosts as $post) {
        $return .= $post['title'];
        $return .= '<br />';
    }
    return $app->json($return);
});
$app->run();