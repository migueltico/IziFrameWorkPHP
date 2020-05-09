<?php namespace config;

class view
{
  /**
     * Renderiza el HTML Final, se le puede pasar como segundo parametro un
     * Array Asociativo y convertira el Key del primer nivel como nombre de la variable a utilizar en el HTML
     * @param String $template_url
     * @param mixed array $parameters
     * @return void
   */
    public static function render(String $template_url, Array $parameters)
    {
        foreach ($parameters as $property => $value) {
            $$property=$value;
        }
        require_once "./view/$template_url.php";
       
   
    }
}

