<?php
require_once __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');


use src\Helpers\RouteHelper;

$C = new RouteHelper;
$C->get($_SERVER['REQUEST_URI']);
