<?php
namespace App\Controllers;
use App\Services\Auth;
use Core\View;
use Core\Router;
class AuthController{
    public function create(){
        return View::render(
            template: 'auth/create',
            layout: 'layouts/main'
        );
    }

    public function store(){
       $email = $_POST['email'];
       $password = $_POST['password'];

       if(Auth::attemp($email , $password)){
        return Router::redirect('/');
       }

       return View::render(
        template: 'auth/create',
        layout: 'layouts/main',
        data: [
            'error' => 'Invalid credentials'
        ]
       );
    }
}