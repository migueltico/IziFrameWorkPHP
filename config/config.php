<?php namespace Config;

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('VIEWS', 'views/');
define('TEMPLATE', 'views/template/');
define('DB_NAME', 'iziphp');
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
$route_group = '';
$route_group_active = false;
$middleware_array = [];
$middleware_active = false;