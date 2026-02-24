<?php

namespace App\Middlewares;

use App\Services\Auth;
use Core\MiddleWare; 
use Core\View as CoreView;

class View implements MiddleWare{
    public function handle(callable $next){
      CoreView::share('user' , Auth::user());

      return $next();
    }
}
