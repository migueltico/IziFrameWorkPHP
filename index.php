<?php session_start();
error_reporting(E_ERROR);
require 'config/config.php';
require_once 'config/autoload.php';
Config\Autoload::on();
require_once "http/routes/rutas.php";
$err = new config\Config;
$err->err();