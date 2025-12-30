<?php
/**
 * @var Core\Router $router
 */

$router->add('GET' , '/' , 'HomeController@index');
$router->add('GET' , '/post' , 'PostController@index');
$router->add('GET' , '/post/{id}' , 'PostController@show');
