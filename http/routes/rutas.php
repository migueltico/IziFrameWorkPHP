<?php namespace http\routes;

use config\route;

//-------------  RUTAS  -----------------//
route::group('admin', function () {

    route::get('/', 'indexController@index');
    route::get('/contact1', 'indexController@index');
    route::get('/blog/buscar', 'indexController@index');
    route::get('/tienda/producto1/:id', 'indexController@index');
    route::middleware(['login@token','login@prueba'], function () {
        route::post('/blog/buscar/id', 'indexController@index',["login@prueba"]);
        route::get('/home2', 'indexController@index');
        route::get('/contact2', 'indexController@index');
        route::get('/blog/buscar2', 'indexController@index');
        route::get('/tienda/producto2/:id', 'indexController@index', ['login@prueba','login@token']);
    });
});
route::middleware(['login@validate_login', 'login@token'], function () {
    route::get('/', 'indexController@b',['login@prueba','login@prueba']);
    route::get('/contact', 'indexController@index');
    route::get('/blog/buscar', 'indexController@index');
    route::get('/tienda/producto3/:id', 'indexController@index');
    route::get('/home/:id', 'indexController@b', ['login@prueba']);
    route::get('/home/', 'indexController@b', ['login@prueba']);
    route::post('/home/:id', 'indexController@b', ['login@prueba']);
});
route::get('/tienda/producto/:idproduct/categoria/:cat_id/user/:userid', 'indexController@index');
route::get('/tienda/producto5/:idproduct/categoria/:cat_id/user/:userid', 'indexController@index');
route::get('/tienda/producto/:idproduct/categoria/:cat_id/user/prueba/', 'indexController@index');
route::get('/contact/custom', 'indexController@index');
route::get('/blog/buscar/id', 'indexController@index');
route::get('/tienda/producto4/:idproduct/categoria/:cat_id', 'indexController@index',["login@prueba"]);
route::post('/tienda/producto', 'indexController@index',["login@prueba"]);