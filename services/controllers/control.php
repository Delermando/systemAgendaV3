<?php 

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

require_once ('globals.php');
$CardController = New \Cartao\controllers\CardController($DataMap);
$Router = new \Cartao\model\router\Router($DataMap->get('get', 'action'), $CardController);

$Router->set('', 'home');
$Router->set('home', 'home');

$Router->set('cadastro', 'cadastro');
$Router->set('cadastroEfetuar', 'cadastroEfetuar');

$Router->set('editar', 'editar');
$Router->set('editarExcluir', 'editarExcluir');
$Router->set('editarAtualizar', 'editarAtualizar');

$Router->set('jsonSelect', 'jsonSelectAllCards');

