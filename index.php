<?php

//отображение ошибок на время тестирования сайта
ini_set('display_errors',1);
error_reporting(E_All);

session_start();

define('ROOT',dirname(__FILE__));
require_once(ROOT.'/components/Autoload.php');


$router = new Router;
$router->run();