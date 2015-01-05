<?php 
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

