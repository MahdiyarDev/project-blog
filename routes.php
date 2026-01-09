<?php
/**
 * @var Core\Router $router
 */

$router->add('GET' , '/' , 'HomeController@index');
$router->add('GET' , '/post' , 'PostController@index');
$router->add('GET' , '/post/{id}' , 'PostController@show');


$router->add('GET' , '/login' , 'AuthController@create');
$router->add('POST' , '/login' , 'AuthController@store');
$router->add('POST' , '/logout' , 'AuthController@destroy');
