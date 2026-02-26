<?php

/**
 * @var Core\Router $router 
 */

use App\Middlewares\Auth;
use App\Middlewares\CSRF;
use App\Middlewares\View;

$router->addGlobalMiddleware(View::class);
$router->addGlobalMiddleware(CSRF::class);
$router->addRouteMiddleware('auth',Auth::class);

use App\Controllers\HomeController;
use App\Controllers\PostController;
use App\Controllers\AuthController;
use App\Controllers\CommentController;
use App\Controllers\Admin\PostController as AdminPostController;
use App\Controllers\Admin\DashboardController;

$router->add('GET' , '/' , HomeController::class . '@index');
$router->add('GET' , '/post' , PostController::class . '@index');
$router->add('GET' , '/post/{id}' , PostController::class . '@show');
$router->add('POST' , '/post/{id}/comment' , CommentController::class . '@store' , ['auth']);

$router->add('GET' , '/login' , AuthController::class . '@create');
$router->add('POST' , '/login' , AuthController::class . '@store');
$router->add('POST' , '/logout' , AuthController::class . '@destroy');


//---------------- Admin Panel Routes ----------------

$router->add('GET' , '/admin/dashboard' , DashboardController::class . '@index' , ['auth']);

$router->add('GET' , '/admin/posts' , AdminPostController::class . '@index' , ['auth']);
$router->add('GET' , '/admin/posts/create' , AdminPostController::class . '@create' , ['auth']);
$router->add('POST' , '/admin/posts' , AdminPostController::class . '@store' , ['auth']);
// $router->add('GET' , '/admin/posts/{id}/edit' , AdminPostController::class . '@edit' , ['auth']);
$router->add('GET', '/admin/posts/{id}/edit', AdminPostController::class . '@edit', ['auth']);
$router->add('POST' , '/admin/posts/{id}' , AdminPostController::class . '@update' , ['auth']);
$router->add('POST' , '/admin/posts/{id}/delete' , AdminPostController::class . '@delete' , ['auth']);

