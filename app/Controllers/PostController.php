<?php

namespace App\Controller;
use Core\Router;

class PostController{
    public function index(){
        return "All posts";
    }

    public function show($id){
       $post = Post::find($id);

       if(!$post){
        Router::notFound();
       }

       $comments = Comment::forPost($id);
       Post::incrementViews($id);
       return View::render(
        template: 'posts/show',
        layout: 'layouts/main',
        data: ['post' => $post , 'comments' => $comments]
       );
    }
}