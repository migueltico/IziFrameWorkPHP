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
    public function prueba($request = '', $next = '')
    {
        $a = true;
        if ($a == true) {

            //echo '<br>prueba <br>';
            return true;
        } else {
            //echo '<br>NO TIENE ACCESO A prueba<br>';
            return false;
        }
    }
}