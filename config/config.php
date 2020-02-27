<?php

namespace Config;

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
$error404 = false;
class Config  
{
    
   public function err()
    {
        if (!$GLOBALS["error404"]) {
            echo "<h1>ERROR404</h1>";
        }else{
            $GLOBALS["error404"]=false;
        }
    }
}

