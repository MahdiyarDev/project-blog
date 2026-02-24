<?php

namespace App\Middlewares;

use App\Services\Auth as ServicesAuth;
use Core\MiddleWare;
use Core\Router;

class Auth implements MiddleWare{
    public function handle(callable $next){
      $user = ServicesAuth::user(); 
      if(!$user){
        Router::unauthorized();
      }

      return $next();
    }
}