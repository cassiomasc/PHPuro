<?php
require_once __DIR__ . '/../vendor/autoload.php';
date_default_timezone_set('America/Sao_Paulo');
session_start();

use src\Helpers\RouteHelper;

$C = new RouteHelper;
$C->get($_SERVER['REQUEST_URI']);
