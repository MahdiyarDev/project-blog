<?php

namespace App\Controllers;
use Core\View;
use App\Models\User;

class HomeController{
    public function index(){
      // User::create([
      //   'name' => 'mahdiyar',
      //   'email' => 'mahdiyar.sham.0674@gmail.com',
      //   'role' => 'admin',
      //   'password' => password_hash('mahdiyar1234' , PASSWORD_DEFAULT)
      // ]);
      // User::create([
      //   'name' => 'mehrdad',
      //   'email' => 'git.mahdiyar.80@gmail.com',
      //   'role' => 'admin',
      //   'password' => password_hash('xram8080' , PASSWORD_DEFAULT)
      // ]);
        return View::render(
        template: 'home/index',
        data: ['message' => 'hello mahdiyar'],
        layout: 'layouts/main'
    );
  }
}