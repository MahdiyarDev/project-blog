<?php

namespace App\Controllers;
use Core\View;
use Core\Router;
use App\Models\Post;
use App\Models\Comment;

class PostController{
    public function index(){
        $search = $_GET['search'] ?? '';
        $posts = Post::getRecent(5 , $search);


       if(!$posts){
        Router::notFound();
       }
       return View::render(
        template: 'post/index',
        layout: 'layouts/main',
        data: [
          'posts' => $posts,
          'search' => $search
        ]
       );
    }
    

    public function show($id){
       $post = Post::find($id);

       if(!$post){
        Router::notFound();
       }

       $comments = Comment::forPost($id);
       Post::incrementViews($id);
       return View::render(
        template: 'post/show',
        layout: 'layouts/main',
        data: ['post' => $post , 'comments' => $comments]
       );
    }
}