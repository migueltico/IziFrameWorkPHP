<?php namespace http\routes;

use config\route;

//-------------  RUTAS  -----------------//
route::group('admin', function () {

    route::get('/', 'indexController@index');
    route::get('/contact1', 'indexController@index');
    route::get('/blog/buscar', 'indexController@index');
    route::get('/tienda/producto/@id', 'indexController@index');
    route::middleware(['login@token'], function () {

        route::get('/home2', 'indexController@index');
        route::get('/contact2', 'indexController@index');
        route::get('/blog/buscar2', 'indexController@index');
        route::get('/tienda/producto2/@id', 'indexController@index');
    });
});
route::middleware(['login@validate_login', 'login@token'], function () {
    route::get('/', 'indexController@b');
    route::get('/contact', 'indexController@index');
    route::get('/blog/buscar', 'indexController@index');
    route::get('/tienda/producto/@id', 'indexController@index');
    route::get('/home', 'indexController@b', ['login@prueba','login@prueba']);
});
route::get('/contact/custom', 'indexController@index');
route::get('/blog/buscar/id', 'indexController@index');
route::get('/tienda/producto/@id/categoria', 'indexController@index');