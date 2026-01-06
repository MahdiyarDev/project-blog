<?php

namespace App\Controller;
use Core\View;

class HomeController{
    public function index(){
        throw new Exception("this has heppened in the web");
        return View::render(
        template: 'home/index',
        data: ['message' => 'hello mahdiyar'],
        layout: 'layouts/main'
    );
  }
}