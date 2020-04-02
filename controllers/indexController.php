<?php

namespace controllers;
// manda a llamar al controlador de vistas
 use Config\view;
// manda a llamar al controlador de conexiones a bases de datos

// la clase debe llamarse igual que el controlador respetando mayusculas
class indexController extends view

{
    public function index(...$var)
    {
        $newArr = array($var,"Variable"=>"NewArr");
        view::render("index2",$newArr);
    }
    public function b($var)
    {
        $newArr = array($var,"Variable"=>"NewArr");
        view::render("index",$newArr);
        
    }
}
