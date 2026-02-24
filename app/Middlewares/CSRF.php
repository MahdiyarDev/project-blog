<?php

namespace App\Middlewares;

use App\Services\CSRF as ServicesCSRF;
use Core\MiddleWare;
use Core\Router;

class CSRF implements MiddleWare{
    public function handle(callable $next){

     if(!ServicesCSRF::verify()){
        Router::unauthorized();
    }

      return $next();
    }
}
