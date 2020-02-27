<?php namespace controllers;

// manda a llamar al controlador de vistas
// use Config\view;

// manda a llamar al controlador de conexiones a bases de datos

// la calse debe llamarse igual que el controlador respetando mayusculas
class indexController//extends view

{
    public function a(...$var)
    {
        print_r($var);
    }
    public function b()
    {
        echo 'B<br>';
    }
}