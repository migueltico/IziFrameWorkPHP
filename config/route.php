<?php

namespace config;

class route
{
    /**
     * *Metodo GET:
     * *Se encarga de verificar si la url obtenida coinside con una url asignada
     * 
     * @param String $ruta url a ejecutar
     * @param String $funcion a ejecutar
     * @param mixed array middlewares a ejecutar
     * @return void
     */
    public static function get(String $ruta, String $funcion, array $middlewares = [])
    {
        $result = false;
        $url = route::assingUrl($ruta);

        $typeUrl = self::validate_type_url($url['ruta']);
        if (!$typeUrl) {
            //!verifico si la url del Get es igual a alguna Ruta Asignada.
            if ($url['url'] == $url['ruta']) {
                echo "<br>URL CHECKED<br>";
                //TODO: HACER QUE EL RETURN DE LOS MIDDLEWARES DEVUELVAN DATOS EN UN ARRAY
                if ($GLOBALS['middleware_active']) {
                    $result = route::middleware_exc($GLOBALS['middleware_array']);
                    if (!$result) return;
                    echo "<br>Group Middleware 1<br>";
                }
                if (!empty($middlewares)) {
                    $result = route::middleware_exc($middlewares);
                    if (!$result) return;
                    echo "<br>Simple Middleware 1<br>";
                }
            }
        } else {
            $hasVar = self::getVar($url['ruta'], $url['url']);
        }
    }
    /**
     * * Verifica si la Ruta tiene activo el Group, y valida los slash y remueve los que son innecesarios
     * @param String $ruta La ruta asignada desde el framework
     * @return void
     */
    public static function assingUrl(String $ruta)
    {
        $ruta = ($GLOBALS['route_group_active'] === true ? rtrim($ruta = $GLOBALS['route_group'] . $ruta, '/') : (strlen($ruta) == 1 ? $ruta : rtrim($ruta, '/')));
        $url = $_SERVER['REQUEST_URI'];
        $url = (strlen($url) > 0 ? $url : rtrim($url, '/'));
        return ['ruta' => $ruta, 'url' => $url];
    }
    public static function middleware_exc($Middlewares)
    {
        foreach ($Middlewares as $Middleware) {
            /**Obtener los middlewares y su controlador en array y lo asignamos a una variable */
            $middle_string_function = route::get_function($Middleware);
            /**concatenamos el string de la ruta del middleware y la variable con el controller para generar la ruta */
            $middle_funtion = "middleware\\" . $middle_string_function['controller'];
            /**Instanciamos un nuevo objeto con la ruta que creeamos anteriormente */
            $middle = new $middle_funtion;
            /**Mandamos a llamar a la funcion del middleware  y la cual retornara True o False y lo asignara a la variable return */
            $return = call_user_func(array($middle, $middle_string_function['function']));
            // var_dump($return);

            return  $return;
        }
    }

    /**
     * Metodo middleware:
     * Se encarga de verificar previamente un middleware
     *  antes de procesar cualquier url perteneciente al grupo.
     * Se pasa en el primer argumento un string con el nombre del
     * archivo del middleware en la carpeta middlewares separado por un @ seguido de la funcion a ejecutar.
     * Como segundo argumento se pasa una funcion anonima con las funciones o rutas a ejecutar.
     * El middleware debe retornar TRUE para continuar o False para detener la ejecucion de la peticion.
     *
     *
     * @param String $Middleware
     * @param mixed $funtion
     * @return void
     */
    public static function middleware(array $Middlewares, $funtion)
    {
        $GLOBALS['middleware_active'] = true;
        $GLOBALS['middleware_array'] = $Middlewares;
        // print_r($GLOBALS['middleware_array']) . '<br>';
        $funtion();
        $GLOBALS['middleware_active'] = false;
        $GLOBALS['middleware_array'] = [];
    }
    public static function extractMiddleware()
    {
    }

    /**
     * Metodo Group:
     *Se encarga de agrupar rutas y  agregarle un prefix de url para funcionar en un ambito especifico,
     *por ejemplo que la url siempre inicie con /admin/dashboard/ y solo se ejecuta la peticion si coincide con el string que se pasa como argumento.
     *Url dentro del ambito:  /productos/all .
     *Union y verificacion del group:.
     * /admin/dashboard/productos/all
     * @param String $url
     * @param mixed $funtion
     * @return void
     */
    public static function group(String $url, $funtion)
    {
        $GLOBALS['route_group'] = '/' . $url;
        $GLOBALS['route_group_active'] = true;
        $funtion();
        $GLOBALS['route_group'] = '';
        $GLOBALS['route_group_active'] = false;
    }
    private static function get_function($function)
    {
        $function = explode("@", $function);
        $result = array(
            'controller' => $function[0],
            'function' => $function[1],
        );
        return $result;
    }
    public function validate_type_url(String $url)
    {
        preg_match('/\\/:/', $url, $elementVar);
        if (count($elementVar) > 0) {
            //print_r($elementVar);
            // echo "<br>-->" . $url . "<br>";
            return array("isVar" => true);
        }
    }
    public function diffArr($a, $b)
    {

        return "<p>a" . $a . "" . $b . "</p>";
    }
    public function getVar(String $ruta, String $url)
    {
       

        $url = ltrim($url, "/");
        $url = rtrim($url, "/");
        $ruta = ltrim($ruta, "/");
        $ruta = rtrim($ruta, "/");
        $ArrayUrl = explode("/", $url);
        $ArrayRuta = explode("/", $ruta);
        if (count($ArrayUrl) == count($ArrayRuta)) {
            $arrayElements = [];
            $arrayDataVars = [];
            $arrayVars = [];

          
            echo "<pre>";
            foreach ($ArrayRuta as $key => $value) {

                preg_match('/:/', $value, $isVar);
                if ($ArrayUrl[$key] == $value) {
                    array_push($arrayElements, $value);
                } elseif (count($isVar) > 0) {                
                    array_push($arrayDataVars, $ArrayUrl[$key]);
                    array_push($arrayVars, $value);
                } else {
                    
                    echo "<br>-----XXX----<strong style='color:red;'>SIN COINCIDENCIA</strong>----XXX>-----br>";
                    echo "<br><strong>URL WEB</strong>: /" . $url . "<br>";
                    echo "<br><strong>RUTA::GET</strong>: /" . $ruta . "<br>";
                    $arrayElements = "";
                    $arrayDataVars = "";
                    return;
                }
            }
         
            echo "<br>>-----*******-----<strong style='color:blue;'>COINCIDENCIA</strong>-----******->-----<br>";
            echo "<br><strong>URL WEB</strong>: /" . $url . "<br>";
            echo "<br><strong>RUTA::GET</strong>: /" . $ruta . "<br>";
            print_r($arrayElements);
            print_r($arrayDataVars);
            print_r($arrayVars);
            echo "</pre>";

        }
    }
}
