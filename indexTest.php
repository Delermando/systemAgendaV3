<?php 

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);

$json_url = "local.agenda.com.br/?action=jsonSelect";

$json = file_get_contents($json_url);
$obj = json_decode($json);
var_dump($obj);