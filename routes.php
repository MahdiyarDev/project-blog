<?php

use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\AuthController;
use App\Controllers\CommentController;

$router->add('GET' , '/' , HomeController::class . '@index');
$router->add('GET' , '/post' , PostController::class . '@index');
$router->add('GET' , '/post/{id}' , PostController::class . '@show');
$router->add('POST' , '/post/{id}/comment' , CommentController::class . '@store');

$router->add('GET' , '/login' , AuthController::class . '@create');
$router->add('POST' , '/login' , AuthController::class . '@store');
$router->add('POST' , '/logout' , AuthController::class . '@destroy');
