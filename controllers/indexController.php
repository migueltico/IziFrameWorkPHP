<?php

namespace controllers;

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
    public function b($var)
    {
        //echo '<br>Index controler Metodo: B<br>';
        // print_r($var["get"]);
        //echo "<br>";
        // http_response_code(200);
        // header('Content-type: application/json');
        echo json_encode($var);
    }
}