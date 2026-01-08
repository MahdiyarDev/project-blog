<?php

namespace App\Controllers;
use Core\View;
use Core\Router;
use App\Models\Post;
use App\Models\Comment;

class PostController{
    public function index(){
        $search = $_GET['search'] ?? '';
        $page = $_GET['page'] ?? 1;
        $limit = 2;
        $posts = Post::getRecent($limit ,$page , $search);
        $total = Post::count($search);

       if(!$posts){
        Router::notFound();
       }
       return View::render(
        template: 'post/index',
        layout: 'layouts/main',
        data: [
          'posts' => $posts,
          'search' => $search,
          'currentPage' => $page,
          'totalPages' => ceil($total / $limit)
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