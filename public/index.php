<?php
require_once __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');


use src\Routes\Route;

$C = new Route;
$C->get($_SERVER['REQUEST_URI']);
