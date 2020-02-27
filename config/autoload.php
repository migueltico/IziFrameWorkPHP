<?php namespace config;

class Autoload
{
    public static function on()
    {
        spl_autoload_register(function ($clase) {
            $ruta = str_replace("\\", "/", $clase) . ".php";
            // print "<br>--------------<br>" . $ruta . "<br>---------------------<br>";
            if (is_readable($ruta)) {
                require_once $ruta;
            } else {
                throw \Exception("Error al cargar la clase : " . $class);
            }
        });
    }
}