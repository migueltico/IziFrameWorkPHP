<?php namespace middleware;

class login
{
    public function validate_login($request = '', $next = '')
    {
        $a = true;
        if ($a == true) {
           //echo '<br>validate_login#1 <br>';
            return true;
        } else {
            //echo '<br>NO validate_login #1 <br>';
            return false;
        }
    }
    public function token($request = '', $next = '')
    {
        $a = true;
        if ($a == true) {

            //echo '<br>TOKEN LOGIN NUMERO #2 <br>';
            return true;
        } else {
            //echo '<br>NO TIENE ACCESO A TOKEN LOGIN #2 <br>';
            return false;
        }
    }
    public function auth($request = '', $next = '')
    {
        $a = true;
        if ($a == true) {

            //echo '<br>AUTH LOGIN NUMERO #3 <br>';
            return false;
        } else {
            //echo '<br>NO TIENE ACCESO A AUTH #3 <br>';
            return false;
        }
    }
    public function prueba($res = '', $next = '')
    {
        //http_response_code(200);
        //header('Content-type: application/json');
        $a = true;
        if ($a == true) {
            //print_r(json_encode($res));

           // print_r($res);
            return true;
        } else {
            //echo '<br>NO TIENE ACCESO A prueba<br>';
            return false;
        }
    }
}